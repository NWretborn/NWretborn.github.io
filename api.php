<?php

require("phpsqlajax_dbinfo.php");

$mysqli = new mysqli('localhost', $username, $password, $database);
$result = $mysqli->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $result->fetch_assoc();
echo htmlentities($row['_message']);

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

?>
