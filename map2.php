<!DOCTYPE html>
<html>
<!-- http://stackoverflow.com/questions/15792655/add-marker-to-google-map-on-click -->
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    	<meta charset="utf-8">

	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
</head>
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
<body onload="load()">
	
	
	
	
	<div class="box center">
		<div class="text_box">

			<div class="left text" style="top:calc(var(--FONT_HEIGHT)*1.4);">
				Username
			</div>
			<input type="text" name="username"
			style="top:calc(var(--FONT_HEIGHT)*1.4); width:65%; right:0.2vh;">

			<div class="left text" style="top:calc(var(--FONT_HEIGHT)*3.7);">
				Password
			</div>
			<input type="password" name="password" 
			style="top:calc(var(--FONT_HEIGHT)*3.7); width:65%; right:0.2vh;">
			
			<form action="map.php" method="get">
				<input type="submit" value="Log in" name="register" 
				style="top:calc(var(--FONT_HEIGHT)*6.5); width:20%; right:0.2vh; ">
			</form>

			<form action="map.php" method="get">
				<input 	type="submit" value="Continue as guest" name="register" 
						style="top:calc(var(--FONT_HEIGHT)*6.5); left:35%; width:35%; min-width:calc(var(--FONT_HEIGHT)*15/2);">
			</form>
			<a href="#" onclick="signOut();">Sign out</a>
		</div>
		

		<!--<form action="signup.php" method="get">-->
		<div onclick="location.href='signup.php'">
			<input type="submit" value ="Sign up" name="register" class="hCenter centerpoint" style="position:absolute; top:98%;" >
		</div>
		<!--</form>-->
</div> 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<div id="map" style="width: 70%; height: 950px; left:30%"></div>
	
	<span class="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
