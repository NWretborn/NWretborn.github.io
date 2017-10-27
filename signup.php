<!DOCTYPE html>
<html>

	
<?php
	ini_set("log_errors", 1);
	ini_set("error_log", "./error.log");	
?>

<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">

	// make json object from serialized array of html form
	$.fn.serializeObject = function() {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function() {
			if (o[this.name]) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});
		return o;
	};


	// post the submission form to API via ajax in json format
	function postForm(path, formID){
		var jsonOUT =$(formID).serializeObject();

		var pass = jsonOUT['password'];
		var rep = jsonOUT['passwordrep'];
		var mail = jsonOUT['mail'];
		var name = jsonOUT['name'];
//Check mail and name for special characters, give alert according
		if( pass == rep){
			delete jsonOUT['passwordrep'];
			var jsonSTR = JSON.stringify(jsonOUT);
			console.log("jsonOUT: " + jsonSTR);
			$.ajax({
				type: "POST",
				url: "./"+path,
				data: jsonSTR,
				success: function(){console.log("success"); document.location="confirmed.php";},
				complete: function(){console.log("complete"); document.location="about.php";},
				error: function(){console.log("success"); document.location="confirmed.php";},
				error: function(jqXHR, textStatus, errorThrown){console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown); document.location="about.php";}, 
				dataType: "json",
				contentType : "application/json"
			});
		}
		else{
			alert("password mismatch!");
		}
	}
</script>
<head>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder - Signup</title>

</head>

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
	
<body>


	<div class="center box">
		<form onsubmit='postForm("../api.php/adduser", "#registerform"); return false' id="registerform">

			<div style="top: 12%; left: 8%">
				Username
			</div>
			<div class="hCenter" style="top: 12%">
				<input type="text" name="name" class="tb5" value="">

			</div>
			<br/>
			<div style="top: 32%; left: 8%;">
				Password
			</div>
			<div class="hCenter" style="top: 32%">
				<input value="" type="password" name="password" class="tb5">
			</div>
			<br/>
			<div style="top: 52%; left: 8%;">
				Repeat password
			</div>
			<div class="hCenter" style="top: 52%">
				<input value="" type="password" name="passwordrep" class="tb5">
			</div>
			<br/>
			<div style="top: 72%; left: 8%;">
				E-mail
			</div>
			<div class="hCenter" style="top: 72%">
				<input value="" type="text" name="mail" font="monospace" class="tb5">
			</div>
			<br/><br/>
			<div class="center" style="top:91%">

				<input type="submit" value="Register" name="register" class="tb4">

			</div>
		</form>
	</div>

	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>

	</body>


</html>
