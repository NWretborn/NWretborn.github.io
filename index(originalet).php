<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<style>
	html{
		position:relative;
		max-height: 100%;
		max-width: 100%
	}
	body{
		background-color: black;
		background-image: url("background.png");
		height: 100%;
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size: 100%; /* hello */
	}
	p{
		position: fixed;
		color: 		green;
		font-family:monospace;
		text-align:	right;
		font-size: 500%;
		right:0;
	}
	
	.vAlign{
		vertical-align: middle;
	}

	a:link, a:visited{
		width: 30vh;
		text-decoration: none;
		color: black;
		text-align: center;
		font-size: 5vh;
		font-family: monospace;
		background-color: #10454e; 
		border-radius: 50000px;
	}
	a:hover, a:active{
		border-color: #29afc4;
		border-radius: 50000px;
		border-width: 2px;
		border-style: solid;
		font-size: 8vh;
	}

	a.small {
		font-size: 5vh;
	}
	#screen{
		position: fixed;
		width:100%;
		height:100%;
	}
	
	.bottom{
		position: fixed;
		bottom:0;
	}
	.right{
		position: fixed;
		right:0;
	}
	.center{
		position:fixed;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	.logo{
		position: fixed;
		height:15vh;
		left:8%;
		bottom:8vw;
		transform: translate(-50%, 50%);
	}
</style>

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

<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
</head>

<body>
	<img src="logo_gray.png" class="logo" 
		onmouseover="changePic(this, 'logo_blue.png'); larger(this);" 
		onmouseout="changePic(this, 'logo_gray.png'); smaller(this);"
		onclick="location.href='about.php';"
	>
	
	<a href="signup.php" class="center">Signup!</a>

<body>

</html>
