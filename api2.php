<?php
	session_start();
?>

<!--  
	login:
		url:	api.php/login/name 	//where name is username
		data: 	json string with a 'password' column with unhashed 
			value of password.
	adduser:
		url: 	api.php/adduser
		data:	json string with columns 'name', 'email' and 
			'password' with corresponding values.
-->

<?php
	ini_set("log_errors", 1);
	ini_set("error_log", "./error.log");
	#ini_set('display_errors', 1);
	#ini_set('display_startup_errors', 1);
	
	// default id to go through database
	$id='id';

	// error-message written to a scrap log in same folder
	function errlog($message){
		error_log($message."\n", 3, "./scrap2.log");
	}

	function badcall($isbad, $message){
		if($isbad){
			errlog($message);
			http_response_code(404);
			die($message);
		}
	}

	function hashpass($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
	
	function verifypass($password){
		return password_verify($password, $hashed_password);
	}

	errlog("STARTLOG");
	errlog("--------------------------------------------------");
	require("phpsqlajax_dbinfo.php");

	// get the HTTP method, path and body of the request
	$method = $_SERVER['REQUEST_METHOD'];
	errlog($_SERVER['PHP_SELF']." received ".$method." request");
	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	$input = json_decode(file_get_contents('php://input'),true);

	// connect to the mysql database
	$link = mysqli_connect('localhost', $username, $password, $database);
	mysqli_set_charset($link,'utf8');

	// retrieve table and key from the path remove from variable $request
	$apicall = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
	$key = array_shift($request)+0;	// "array_shift($request)+0" before

	// initial modifications based on what call is made
	switch($apicall){
		case 'adduser':
			$table='user';
			if($input['password'])
				$input['password'] = hashpass($input['password']);
			badcall($method!='POST', "use POST for adduser"); //NOT SURE IF BADCALL IS GOOD METHOD
			break;
		case 'addwifi':
			$table='markers';
			badcall($method!='POST', "use POST for addwifi");
			break;
		case 'login':
			badcall($method!='GET', "use GET for login");
			$table='user';
			$id='name';
			break;
		default:
			badcall(True, "not an api-function");
			break;
	}

	// escape the columns and values from the input object
	$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
	$values = array_map(function ($value) use ($link) {
		if ($value===null) return null;
		return mysqli_real_escape_string($link,(string)$value);
	},array_values($input));
	
	// build the SET part of the SQL command
	$set = '';
	for ($i=0;$i<count($columns);$i++) {
		$set.=($i>0?',':'').'`'.$columns[$i].'`=';
		$set.=($values[$i]===null?'NULL':'"'.$values[$i].'"');
	}
	
	// create SQL based on HTTP method
	switch ($method) {
		case 'GET':
			$sql = "select * from `$table`".($key?" WHERE $id=$key":'');
			break;
		case 'PUT':
			$sql = "update `$table` set $set where $id=$key";
			break;
		case 'POST':
			$sql = "insert into `$table` set $set";
			break;
		case 'DELETE':
			$sql = "delete from `$table` where $id=$key"; // all occurences of $key was without ' before
			break;
	}
	errlog("sql {".$sql."} sent");
	
	// excecute SQL statement
	$result = mysqli_query($link,$sql);
	$errors = mysqli_error($link);
	if($errors){
		errlog("SQL ERROR: ".$errors);
	}
	
	// die if SQL statement failed
	if (!$result) {
		errlog("sql no result");
		http_response_code(404);
		die(mysqli_error());
	}
	else{
		http_response_code(200);
	}

	$resultarray = array();
	// print results, insert id or affected row count
	if ($method == 'GET') {
		if (!$key) echo '[';
		for ($i=0;$i<mysqli_num_rows($result);$i++) {
			$obj = mysqli_fetch_object($result);	// append all results to array
			errlog("result nr $i: ".$obj->password);
			echo ($i>0?',':'').json_encode($obj);
			$resultarray[$i] = $obj;
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
		case 'login':
			errlog("resultarray: ".$resultarray[0]);
			break;
		default:
			badcall(True, "not an api-function");
			break;
	}

	errlog("--------------------------------------------------");
	errlog("ENDLOG");
?>
