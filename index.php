<?php
	session_start();
	ini_set("log_errors", 1);
	ini_set("error_log", "./error.log");
?>

<!DOCTYPE html>
<html>
	
<head>
	<meta name="google-signin-client_id" content="608078643029-d690aqehavkkf285rkv30plgdjq3uh0u.apps.googleusercontent.com">
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	<link rel="stylesheet" type="text/css" href="libs/index.css">
	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<script>


	
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
				error: function(jqXHR, textStatus, errorThrown){
					console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
					if(jqXHR.status==404) {
        					window.location.href="loginerror.php";
    					}
					else{
						location.reload();
					}
				},
				dataType: "json",
				contentType : "application/json"
			});
			user.value="";
			pass.value="";
		}
		else{
			alert("incorrect login credentials!"); //does nothing
		}
	}
	
	function logout(){
		$.post( "api.php/logout", { logout: "logoutplease"} ).done( function(){
			location.reload();}	
		);
	}
	

</script>
	
	
<body>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>

<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
	
	function onSignIn(googleUser) {
  		var profile = googleUser.getBasicProfile();
  		console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  		console.log('Name: ' + profile.getName());
  		console.log('Image URL: ' + profile.getImageUrl());
  		console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
		window.location.replace("map.php");
	}
</script>

	
	
	

	<?php
		if(isset( $_SESSION['username'] ) ){
			include("map.php");
		}
		else{
			include("login_box.php");
		}
		echo "hello php-world";
	
	?>
	

	
	<div id="logo" class="index" onclick="location.href='about.php'"> </div>
	<div class="cache" style="background: url(img/logo_about_gray.png)"></div>

	
</body>
</html>

<!--

	style="top: 12%; left: 8%"			style="top: 12%"
	style="top: 32%; left: 8%;"			style="top: 32%"
	style="top:65%; left: 89%;"			style="top:65%; left: 58%;"
-->
