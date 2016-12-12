<!--

	--------------------------------------------------

		HOW THE API WORKS:

	--------------------------------------------------


	adduser

	addwifi

	verifypassword



	--------------------------------------------------OLDSTUFF:

	GET request with url = api.php/TABLE/ID will set table to "TABLE" and request the column
	with id "ID" from database
	--------------------------------------------------
	POST request will only use TABLE in the example url of previous description. It reads from
	php://input and will make a SQL set-request to the table specified if the input is a string
	of proper JSON format.

	note: if POST request is made to a table named "user" with a column named "password" the
	password will be hashed before insertion.
	--------------------------------------------------
-->

<?php
	// error-message written to a scrap log in same folder
	function errlog($message){
		error_log($message."\n", 3, "./scrap2.log");
	}

?>


<?php
	errlog("STARTLOG");
	errlog("--------------------------------------------------");
	require("phpsqlajax_dbinfo.php");

	// get the HTTP method, path and body of the request
	$method = $_SERVER['REQUEST_METHOD'];

	errlog(basename($_SERVER['PHP_SELF'])." received ".$method." request");

	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	$input = json_decode(file_get_contents('php://input'),true);

	// connect to the mysql database
	$link = mysqli_connect('localhost', $username, $password, $database);
	mysqli_set_charset($link,'utf8');

	errlog("path-info".$_SERVER['PATH_INFO']);

	// retrieve table and key from the path remove from variable $request
	$apicall = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
	
	errlog("apicall: ".$apicall);

	$key1 = array_shift($request);
	
	errlog("shift: ".$key1);

	$key2 = array_shift($request);

	errlog("shift: ".$key2);

	if($method == "POST" && $table == "user" && $input['password']){
		$password = $columns['password'];
		$input['password'] = password_hash($password, PASSWORD_DEFAULT);
		error_log("password after hash: ".$input['password']."\n", 3, "./scrap.log");
	}
	errlog("table: ".$table);

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
			$sql = "select * from `$table`".($key?" WHERE id=$key":'');
			break;
		case 'PUT':
			$sql = "update `$table` set $set where id=$key";
			break;
		case 'POST':
			$sql = "insert into `$table` set $set";
			break;
		case 'DELETE':
			$sql = "delete from `$table` where id=$key";
			break;
	}

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

	// print results, insert id or affected row count
	if ($method == 'GET') {
		if (!$key) echo '[';
		for ($i=0;$i<mysqli_num_rows($result);$i++) {
			errlog(($i>0?',':'').json_encode(mysqli_fetch_object($result)));
			echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
		}
		if (!$key)
			echo ']';
	} elseif ($method == 'POST') {
		echo '{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}';
		errlog('{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}');
	} else {
		errlog( mysqli_affected_rows($link) );
		echo mysqli_affected_rows($link);
	}

	// close mysql connection
	mysqli_close($link);
	errlog("--------------------------------------------------");
	errlog("ENDLOG");
?>
