<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">

</head>

<script src="libs/std.js"></script>

<body>

	<div class="center box">
			<div style="top: 12%; left: 8%">
				Username
			</div>
			<div class="hCenter" style="top: 12%">
				<input id="c" type="text" name="Fname" class="tb5">
			</div>
			<br/>
			<div style="top: 32%; left: 8%;">
				Password
			</div>
			<div class="hCenter" style="top: 32%">
				<input id="c" type="password" name="Fname" class="tb5">
			</div>
			<br/>
			<div class="center" style="top:65%; left: 89%;">
			<form action="map.php" method="get">
				<input type="submit" value="Log in" name="register" class="tb4">
				</form>
			</div>
			<div class="center" style="top:65%; left: 58%;">
			<form action="map.php" method="get">
				<input type="submit" value="Continue as guest" name="register" class="tb4">
				</form>
			</div>
			<div class="center" style="top:101%;">
			<form action="signup.php" method="get">
				<input type="submit" value="Sign up" name="register" class="tb4">
				</form>
			</div>
			
	</div>
	


	<span class="logo" onclick="location.href='about.php'"> </span>
	<span class="cache" style="background: url(img/logo_about_gray.png)"></span>
	
</body>
</html>


