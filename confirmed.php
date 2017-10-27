

<!DOCTYPE html>
<html>
<style>
	body{
		background-color: black;
		/* background-image: url("index_background.png"); */
		background-size:cover;
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
<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
<meta http-equiv="Content-Language" content="sv">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>WiFinder</title>
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
	}
	.tb4 {
		
		background-color: #10454e;
		border:0px solid #29afc4;
		border-radius:20px;
		font-size: 1vw;
	}
	.center{
		
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	.hCenter{
		left: 70%;
		transform: translate(-50%, 0);
	}
	p{
		color: #10454e;
		text-align: left;
		font-size: 90%;
	}
	p.subtext{
		font-size: 80%;
		text-align: right;
	}
	div{
		font-size:1.5vw;
		position: fixed;
	}
	.box{
		height: 6vh;
		color: #79969a;
		font-family: monospace;
		background-color: black;
		width: 30vw;
		border: 2px solid #10454e;
		border-radius:10px;
		padding: 20px;
	}
	.tb4:hover{
		border:1px solid #29afc4;
		border-radius: 20px;
	}
	input:focus {
		border: 1px solid #29afc4;
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

<body>

	<div class="center box">
		<span style="color: #29afc4; top: 40%;">Thank you!</span> You may now <span style="color: #29afc4;"><a href="/index.php">Log in!</a></span>
		
	</div>

	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>


</body>
</html>


