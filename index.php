<!DOCTYPE html>
<html>
<style>
	body{
		background-color: black;
		/* background-image: url("index_background.png"); */
		background-size:cover;
	}
</style>
<head>
<meta http-equiv="Content-Language" content="sv">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>WiFinder - Signup</title>
<style type="text/css">
	#c{	text-align: center;	}
	#l{	text-align: left;	}
	#r{	text-align: right;	}
	
	/* Rounded Corner */
	.tb5 {
		background-color: #10454e;
		border:1px solid #10454e;
		border-radius:20px;
		font-size:1.5vw;
		font-family: monospace;
		width: 143%;
	}
	.tb4 {
		
		background-color: #10454e;
		border:0px solid #29afc4;
		border-radius:20px;
		font-size: 1.5vw;
	}
	.center{
		
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	.hCenter{
		left: 58.5%;
		transform: translate(-50%, 0);
	}
	div{
		font-size:1.5vw;
		position: fixed;
	}
	.box{
		height: 20vh;
		color: #79969a;
		font-family: monospace;
		background-color: black;
		width: 30vw;
		border: 2px solid #10454e;
		border-radius:10px;
		padding: 20px;
	}
	.tb4:hover{
		border:2px solid #29afc4;
		border-radius: 20px;
	}
	input:focus {
		border: 2px solid #29afc4;
		border-radius: 20px;
		outline: none;
	}
	.logo{
		position: fixed;
		height:15vh;
		left:8%;
		bottom:8vw;
		transform: translate(-50%, 50%);
	}
</style>

</head>
<script type="text/javascript">
	function changePic(element, imageName) {
    	element.setAttribute('src', imageName);
	}
	
	function larger(element){
		var style = window.getComputedStyle(element),
		h = parseFloat(style.height),
		vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
		h = (h*1.2)/vH*100;
		element.style.height = h + 'vh';
	}
	
	
	function smaller(element){
		var style = window.getComputedStyle(element),
		h = parseFloat(style.height),
		vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
		h = (h/1.2)/vH*100;
		element.style.height = h + 'vh';
	}
	
</script>
<body>

	<div class="center box">
			<div style="top: 12%; left: 8%">
				Username1
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
	
	<img src="logo_blue.png" class="logo" 
		onmouseover="changePic(this, 'logo_about.png'); larger(this);" 
		onmouseout="changePic(this, 'logo_blue.png'); smaller(this);"
		onclick="location.href='about.php';"
	>
	
</body>
</html>


