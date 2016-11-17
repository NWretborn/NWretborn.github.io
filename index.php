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


	<div class="box center">
		<span class="text_box">

			<span class="left text" style="top:calc(var(--FONT_HEIGHT)*1);">
				Username
			</span>
			<input type="text" name="username" class="right" style="top:calc(var(--FONT_HEIGHT)*1); width:50%;">

			<span class="left text" style="top:calc(var(--FONT_HEIGHT)*3);">
				Password
			</span>
			<input type="password" name="password" class="right" style="top:calc(var(--FONT_HEIGHT)*3); width:50%;">
			
			<form action="map.php" method="get">
				<input type="submit" value="Log in" name="register" class="right" style="top:calc(var(--FONT_HEIGHT)*6);">
			</form>

			<form action="map.php" method="get">
				<input type="submit" value="Continue as guest" name="register" style="top:calc(var(--FONT_HEIGHT)*6); left:48%;">
			</form>
		</span>

		<form action="signup.php" method="get">
			<input type="submit" value="Sign up" name="register" class="hCenter centerpoint" style="position:absolute; top:100%;" >
		</form>
	</div>	
	

	<span class="logo" onclick="location.href='about.php'"> </span>
	<span class="cache" style="background: url(img/logo_about_gray.png)"></span>

	
</body>
</html>

<!--

	style="top: 12%; left: 8%"			style="top: 12%"
	style="top: 32%; left: 8%;"			style="top: 32%"
	style="top:65%; left: 89%;"			style="top:65%; left: 58%;"
-->
