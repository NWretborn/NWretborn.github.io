<?php
	if(isset($_SESSION['username'])){
		session_start();
	}
	else{
		alert("incorrect login credentials!"); //does nothing
	}
?>
