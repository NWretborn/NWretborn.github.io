<?php
	if(isset($_SESSION['username'])){
		session_start();
	}
	else{
						$message = "wrong credentials";
				echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
