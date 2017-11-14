<?php
	#session_start() creates a session or resumes the current one based on a session identifier 
	#passed via a GET or POST request,or passed via a cookie. 
	session_start();
?>

<!--  
	login:
		url:	api.php/login/name 	//where name is username, it will be added with quotation marks (works with ID)
		data: 	password sent to $_GET['password']. Sending a json object with {password: "yourPassword"} works
	logout:
		url: 	api.php/logout
	adduser:
		url: 	api.php/adduser
		data:	json string with columns 'name', 'email' and 
			'password' with corresponding values.
	addwifi:
		url: 	api.php/addwifi
		data: 	...add more info here...
	wifipic:
		method:	POST
		url: 	api.php/wifipic
		data:	send picname with $_POST['picname'] and picture with $_FILE['file']
-->

<?php
	#Sets the charset to UTF8, this speciefies how characters are to be used within the API.
	#It also starts an error log that saves any errors recorded in a .txt file on the server.
	mysql_set_charset("UTF8");
	ini_set("allow_url_fopen", true);
	ini_set("log_errors", 1);
	ini_set("error_log", "./error.log");
	#Default id to go through database
	$id='id';
	#Function for writing errors to error log
	function errlog($message){
		error_log($message."\n", 3, "./scrap2.log");
	}
	#Badcall function, returns a 404 http response code(not found), if wrong method is used.
	function badcall($isbad, $message){
		if($isbad){
			errlog($message);
			http_response_code(404);
			die($message);
		}
	}
	
	#Function for hashing(encrypting) the users password
	function hashpass($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
	#Function for verifying password when signing in	
	function verifypass($password, $hashed_password){
		return password_verify($password, $hashed_password);
	}
?>

<?php
	#Writes to the errorlog and includes the database information file
	errlog("STARTLOG");
	errlog("--------------------------------------------------");
	require("phpsqlajax_dbinfo.php");
	#Get the HTTP method(POST, GET, PUT or DELETE)
	$method = $_SERVER['REQUEST_METHOD'];
	#Post information to errorlog
	errlog($_SERVER['PHP_SELF']." received ".$method." request");
	#Sets the path to a variable, e.g. adduser, addwifi etc
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	
	#Assigns the JSON object to a php-variable and decodes it into the right format.
	$input = file_get_contents('php://input');
	$input = json_decode($input,true);
	#Creates a conenction to the database using variables found in the phpsqlajax_dbinfo.php file
	$link = mysqli_connect('localhost', $username, $password, $database);
	mysqli_set_charset($link,'utf8');
	#Retrieve table and key from the path remove from variable $request
	$apicall = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
	$key = array_shift($request);
	#Uses apicall to determine witch function was called.
	switch($apicall){
		
		#This function is for adding a user. It checks for the correct method, sets the table
		#to user and hashes the password.
		case 'adduser':
			
			badcall($method!='POST', "use POST for adduser");
			$table='user';
			$curuser = $input['name'];
			
			if($input['password']){
				$input['password'] = hashpass($input['password']);
			}
			break;
		
		#This function is for adding wifi networks. It checks for the correct method and 
		#sets the table to markers
		case 'addwifi':
			
			badcall($method!='POST', "use POST for addwifi");
			$table='markers';
			break;
			
		#This function is for deleting a wifi network. It sets the table to markers and the id to the picurl.
		#Wifi networks are distinguished by their key, which is a combination of the latitude and longitude coordinates
		#saved in a string. It then sets the method to delete.
		case 'deletewifi':
			
			badcall($method!='POST', "use POST for deletewifi");
			
			if(($_SESSION['username'] == $input['user']) or ($_SESSION['username'] == 'admin')){
				$table='markers';
				$id='picurl';
				$key= $input['picurl'];
				$method = 'DELETE';
				break;
			}
			
			else{
				badcall(True, "Only your own networks can be removed");
				break;
			}
			
		#This functions adds a picture to a wifi network. It includes the upload.processor.php
		#used to upload files to the server.
		case 'wifipic':
			
			errlog("POST picname: ".$_POST['picname']);
			
			if(isset($_FILE['file']))
				errlog("FILE is set!");
			
			include('upload.processor.php');
			exit();
			break;
			
		#This function is for logging in, it checks for the correct method and
		#sets the table to the user table and the ID for the user name
		case 'login':
			
			badcall($method!='GET', "use GET for login");
			$table='user';
			$id='name';
			break;
		
		#This function is for logging out, it finalizes here and destroys the client session.
		case 'logout':
			
			errlog("logging out user: ".$_SESSION['username']);
			unset($_SESSION['username']);
			exit();
			break;
		
		#If the call is not one of the switch cases, the api returns a bad call.
		default:
			badcall(True, "not an api-function");
			break;
			
	}
	#This function is used to create a legal SQL string. The given string is encoded to 
	#an escaped SQL string, taking into account the current character set of the connection.
	#This prevents SQL-injection attacks from potential hackers.
	$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
	$values = array_map(function ($value) use ($link) {
		if ($value===null) return null;
		return mysqli_real_escape_string($link,(string)$value);
	},array_values($input));
	
	#The 'set' variable is used when updating and inserting into the database. It contains
	#all the information from the JSON object, e.g. username, password, e-mail etc.
	$set = '';
	for ($i=0;$i<count($columns);$i++) {
		$set.=($i>0?',':'').'`'.$columns[$i].'`=';
		$set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
	}
	
	#Depending on the http method used, this switch forms the apropriate SQL statement
	switch ($method) {
		case 'GET':
			$sql = "select * from `$table`".($key?" WHERE $id='$key'":'');
			break;
		case 'PUT':
			$sql = "update `$table` set $set where $id='$key'";
			break;
		case 'POST':
			$sql = "insert into `$table` set $set";
			break;
		case 'DELETE':
			$sql = "delete from `$table` where $id='$key'";
			break;
	}
	errlog("sql {".$sql."} sent");
	
	// excecute SQL statement
	$result = mysqli_query($link,$sql);
	$errors = mysqli_error($link);
	if($errors){
		errlog("SQL ERROR: ".$errors);
		if (strpos($errors, $curuser) !== false) {
   			echo "HEJS";
			http_response_code(404);
			die(mysqli_error());
	}
	}
	
	// die if SQL statement failed
	if (!$result) {
		errlog("sql no result");
		http_response_code(404);
		die(mysqli_error());
	}
	$resultarray = array();
	// print results, insert id or affected row count
	if ($method == 'GET') {
		if (!$key) echo '[';
		for ($i=0;$i<mysqli_num_rows($result);$i++) {
			$obj = mysqli_fetch_object($result);	// append all results to array
			$resultarray[$i] = $obj;
			echo ($i>0?',':'').json_encode($obj);
		}
		if (!$key)
			echo ']';
	} elseif ($method == 'POST') {
		echo '{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}';
		errlog('post info: '.'{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}');
	} else {
		echo mysqli_affected_rows($link);
		errlog("affected rows: ".mysqli_affected_rows($link) );
	}
	
	// close mysql connection
	mysqli_close($link);
	// backend changes without SQL
	switch($apicall){
		case 'adduser':
			
			break;
		case 'addwifi':
			
			break;
			
		case 'deletewifi':
			
			break;
		case 'login':
			errlog("number of elements: ".count($resultarray));
			
			$obj = $resultarray[0];
			errlog("hashed: ".$obj->password);
			errlog("password: ".$input['password']);
			if(verifypass($_GET['password'], $obj->password)){
				errlog("password ok!");
				$_SESSION['username'] = $obj->name;
				exit();
			}
			else{
				badcall(True, "Wrong Credentials");
			}
			break;
		default:
			badcall(True, "reached end without api-function");
			break;
	}
	errlog("--------------------------------------------------");
	errlog("ENDLOG");
?>
