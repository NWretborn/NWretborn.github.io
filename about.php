<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<style>
</style><?php
	session_start();
?>

<html>

<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="wifinder.css">
</head>

<body>

	<?php
		include('/afs/ltu.se/systemdata/www/students/nicvre-3/functions.php');
	?>

	<div class="center box">
		<span style="color: #29afc4;">WiFinder</span> is a user-driven website for finding free wifi networks(cafés, libraries etc) with the help of google maps.<br/>
		Networks are rated by users, submitted by users and the top rated review displayed first when viewing a network.<br/>
		The site also includes a download feature for offline usage which may come in handy if you're out traveling.
		<br/><br/><br/>
		<p>
		Site created by
		</p>
		<p class="subtext">
		Jakob Norell<br/>norjak-3@ltu.student.se
		<br/><br/>
		Niclas Vretborn<br/>nicvre-3@student.ltu.se
		</p>
	</div>

	<span class='logo' onclick="location.href='index.php';"></span>

</body>
</html>


