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
			<input type="submit" value="Log in" name="register" id="login"
			style="top:calc(var(--FONT_HEIGHT)*6.5); width:20%; right:0.2vh; ">
			
		</form>
		<!--	GOOGLE SIGNOUT
		<a href="#" onclick="signOut();">Sign out</a>
		-->
		<div class="g-signin2" data-onsuccess="onSignIn" style="top: 80%; left: 80%"></div>
	</div>
	
	
	<!--<form action="signup.php" method="get">-->
	
	<div onclick="location.href='signup.php'">
		<input type="submit" value ="Sign up" name="register" class="hCenter centerpoint" style="position:absolute; top:98%;" >
	</div>
	<!--</form>-->
</div>	
<html>
<script>
	document.getElementById("password")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode == 13) {
        document.getElementById("login").click();
    }
});
</script>
</html>
