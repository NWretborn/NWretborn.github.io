<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
</head>

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
		if( pass == rep){
			delete jsonOUT['passwordrep'];
			var jsonSTR = JSON.stringify(jsonOUT);
			console.log("jsonOUT: " + jsonSTR);
			$.ajax({
				type: "POST",
				url: "./"+path,
				data: jsonSTR,
				success: function(){console.log("success");},
				complete: function(){console.log("complete");},
				error: function(jqXHR, textStatus, errorThrown){console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);}, 
				dataType: "json",
				contentType : "application/json"
			});
		}
		else{
			alert("password mismatch!");
		}
	}
</script>

<body>

<div class="center box">
<div class="text_box">
	<form action="" onsubmit='postForm("../api2.php/login", "#registerform"); return false' id="registerform">
		<div style="top: 25%; left: 8%">
			Username
		</div>
		<div class="center" style="top: 25%">
			<input type="text" name="name" class="tb5" value="bread">
		</div>
		<br/>
		<div style="top: 50%; left: 8%;">
			Password
		</div>
		<div class="center" style="top: 50%">
			<input value="bird" type="password" name="password" class="tb5">
		</div>
	</form>
</div>
</div>

<span class="logo2" onclick="location.href='index.php'"> </span>
<span class="cache" style="background: url(img/logo_blue.png)"></span>

</body>


</html>
