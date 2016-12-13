<!DOCTYPE html>
<html>
	
<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	
	<meta name="google-signin-client_id" content="919161926395-a0q30s78sal0c8vboi8bthul62r7evep.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<script>
	function onSignIn(googleUser) {
		var profile = googleUser.getBasicProfile();
		console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		console.log('Name: ' + profile.getName());
		console.log('Image URL: ' + profile.getImageUrl());
		console.log('Email: ' + profile.getEmail());
	}

	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
	}
	
	// post the submission form to API via ajax in json format
	function loginForm(){
		var user = document.getElementById("username");
		var pass = document.getElementById("password");
		var path = "api.php/login/" + user.value;
		var jsonSTR = { password: pass.value };
		console.log("jsonOUT: " + jsonSTR);
		if( user && pass ){
			$.ajax({
				type: "GET",
				url: "./"+path,
				data: jsonSTR,
				success: function(){console.log("success");},
				complete: function(){console.log("complete");},
				error: function(jqXHR, textStatus, errorThrown){console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);}, 
				dataType: "json",
				contentType : "application/json"
			});
			user.value="";
			pass.value="";
		}
		else{
			console.log("tried to log in without form filled in");
		}
	}

</script>
	
	
<body>


	<div class="box center">
		<div class="text_box">

			<div class="left text" style="top:calc(var(--FONT_HEIGHT)*1.4);">
				Username
			</div>
			<input id="username" type="text" name="username"
			style="top:calc(var(--FONT_HEIGHT)*1.4); width:65%; right:0.2vh;">

			<div class="left text" style="top:calc(var(--FONT_HEIGHT)*3.7);">
				Password
			</div>
			<input id="password" type="password" name="password" 
			style="top:calc(var(--FONT_HEIGHT)*3.7); width:65%; right:0.2vh;">
			
			<form onsubmit="loginForm(); return false;" method="get">
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
	<div class="g-signin2" data-onsuccess="onSignIn"></div>

	<div id="logo" class="index" onclick="location.href='about.php'"> </div>
	<div class="cache" style="background: url(img/logo_about_gray.png)"></div>

	
</body>
</html>

<!--

	style="top: 12%; left: 8%"			style="top: 12%"
	style="top: 32%; left: 8%;"			style="top: 32%"
	style="top:65%; left: 89%;"			style="top:65%; left: 58%;"
-->
