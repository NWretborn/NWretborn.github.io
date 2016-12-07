<!DOCTYPE html>
<html>

<style>
	body{
		background-color: black;
		/* background-image: url("index_background.png"); */
		background-size:cover;
	}
</style>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	
	function postForm(path, formName){
		//var formData = $.parseJSON( JSON.stringify( $(formName).serialize() ) );
		
		
		var origData =$(formName).serializeArray();
		var formData = JSON.stringify(origData);
		
		//alert(window.location.pathname);
		//formData = $.parseJSON('[' + formData + ']');
		
		// alert(path + "\n" + formName + "\n" + formData);
		
		//var arr = [];
		//var showData = formData;
		//for(var i in showData){
		//	arr.push(showData[i]);
		//}
		alert($(formName) + "\n" + origData + "\n" + formData);
		//alert(formData + "\n\n" + formData[0] + "\n" + formData[0][0]);
		$.ajax({
			type: "POST",
			url: "./"+path,			// "/" would refer to root, it seems
			data: formData,
			success: function(){alert("success?");},
			dataType: "json",
			contentType : "application/json"
		});
		
		//post(path, formData);
		
		//$.post(path, formData, (function () {alert("$.post works")}));
		//alert("after $.post");
		
		//alert(formData);
		//var xhttp = new XMLHttpRequest();
		//xhttp.open("POST", "http://localhost/api.php", true);
		//xhttp.send(formData);
	}
	
	function post(path, params, method) {
		method = method || "post"; // Set method to post by default if not specified.

		// The rest of this code assumes you are not using a library.
		// It can be made less wordy if you use one.
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", path);

		for(var key in params) {
			alert(key);
			if(params.hasOwnProperty(key)) {
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", key);
				hiddenField.setAttribute("value", params[key]);

				form.appendChild(hiddenField);
			}
		}

		document.body.appendChild(form);
		form.submit();
	}
</script>
<head>
<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
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
		left: 50%;
		transform: translate(-50%, 0);
	}
	div{
		font-size:1.5vw;
		position: fixed;
	}
	.box{
		height: 35vh;
		color: #79969a;
		font-family: monospace;
		background-color: black;
		width: 40vw;
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

<body>


	<div class="center box">
		<form onsubmit='postForm("../api.php", "#registerform"); return false' id="registerform">

			<div style="top: 12%; left: 8%">
				Username
			</div>
			<div class="hCenter" style="top: 12%">
				<input type="text" name="name" class="tb5">

			</div>
			<br/>
			<div style="top: 32%; left: 8%;">
				Password
			</div>
			<div class="hCenter" style="top: 32%">
				<input type="password" name="password" class="tb5">
			</div>
			<br/>
			<div style="top: 52%; left: 8%;">
				Repeat password
			</div>
			<div class="hCenter" style="top: 52%">
				<input type="password" name="passwordrep" class="tb5">
			</div>
			<br/>
			<div style="top: 72%; left: 8%;">
				E-mail
			</div>
			<div class="hCenter" style="top: 72%">
				<input type="text" name="mail" font="monospace" class="tb5">
			</div>
			<br/><br/>
			<div class="center" style="top:91%">

				<input type="submit" value="Register" name="register" class="tb4">

			</div>
		</form>
	</div>

	<?php
		#if($_POST){
		#	include("api.php");
		#	echo 	'<script type="text/javascript">alert("yoyo");</script>';
		#}
	?>


	<span class="logo2" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>

	</body>


</html>
