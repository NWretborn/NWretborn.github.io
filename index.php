<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	
</head>

<body>


	<div class="box center">
		<span class="text_box">

			<span class="left text" style="top:calc(var(--FONT_HEIGHT)*1+1vh);">
				Username
			</span>
			<input type="text" name="username"
			style="top:calc(var(--FONT_HEIGHT)*1+1vh); width:50%; right:0;">

			<span class="left text" style="top:calc(var(--FONT_HEIGHT)*3+1vh);">
				Password
			</span>
			<input type="password" name="password" 
			style="top:calc(var(--FONT_HEIGHT)*3+1vh); width:50%; right:0;">
			
			<form action="map.php" method="get">
				<input type="submit" value="Log in" name="register" 
				style="top:calc(var(--FONT_HEIGHT)*6+1vh); width:15%; right:0; ">
			</form>

			<form action="map.php" method="get">
				<input type="submit" value="Continue as guest" name="register" style="top:calc(var(--FONT_HEIGHT)*6+1vh); left:50%; width:30%;">
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
