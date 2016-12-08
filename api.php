<?php
	require("phpsqlajax_dbinfo.php");
	#ini_set('display_errors', 1);
	#ini_set('display_startup_errors', 1);

	// get the HTTP method, path and body of the request
	$method = $_SERVER['REQUEST_METHOD'];

	error_log("api.php received ".$method." request\n", 3, "./scrap.log");

	$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
	//echo "<br/>php://input: ".file_get_contents('php://input');
	$input = json_decode(file_get_contents('php://input'),true);

	//error_log("input: ".file_get_contents('php://input')."\n", 3, "./scrap.log");

	// connect to the mysql database
	$link = mysqli_connect('localhost', $username, $password, $database);
	mysqli_set_charset($link,'utf8');

	// retrieve the table and key from the path
	$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));

	$key = array_shift($request)+0;

	// escape the columns and values from the input object
	$columns = preg_replace('/[^a-z0-9_]+/i','',array_keys($input));
	$values = array_map(function ($value) use ($link) {
		if ($value===null) return null;
		return mysqli_real_escape_string($link,(string)$value);
	},array_values($input));

	// build the SET part of the SQL command
	//error_log("received following data:\n", 3, "./scrap.log");
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
			//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			error_log($set."\n", 3, "./scrap.log");
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
		error_log("SQL ERROR: ".$errors."\n", 3, "./scrap.log");
	}

	// die if SQL statement failed
	if (!$result) {
		http_response_code(404);
		die(mysqli_error());
	}

	// print results, insert id or affected row count
	if ($method == 'GET') {
		if (!$key) echo '[';
		for ($i=0;$i<mysqli_num_rows($result);$i++) {
			//error_log($i>0?',':'').json_encode(mysqli_fetch_object($result), 3, "./scrap.log");
			echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
		}
		if (!$key)
			echo ']';
	} elseif ($method == 'POST') {
		//error_log('{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}', 3, "./scrap.log");
		echo '{ "success":true, "data":[ { "id":'.mysqli_insert_id($link).' }]}';
	} else {
		//error_log("affected_rows:".mysqli_affected_rows($link), 3, "./scrap.log");
		echo mysqli_affected_rows($link);
	}

	// close mysql connection
	mysqli_close($link);

?>
