<?php

// filename: upload.form.php

// first let's set some variables

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php';

// set a max file size for the html upload form
$max_file_size = 30000; // size in bytes

// now echo the html page
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<!DOCTYPE html>
<html>
<!-- http://www.htmlgoodies.com/beyond/php/article.php/3877766/Web-Developer-How-To-Upload-Images-Using-PHP.htm -->
	
	
	
	
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    	<meta charset="utf-8">
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
	
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
<script type="text/javascript">
// make json object from serialized array of html form

// Get the element with id="defaultOpen" and click on it
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
		var type = jsonOUT['type'];
		if( type == 'yes' || type == 'no'){
			var jsonSTR = JSON.stringify(jsonOUT);
			$.ajax({
				type: "POST",
				url: "./"+path,
				data: jsonSTR,
				success: function(){alert("Network submitted!");},
				dataType: "json",
				contentType : "application/json"
			});
			window.alert("Network added!");
			window.onload = function(){
			submitForms();
			}
			window.location = "http://213.113.7.224/map.php";
		}
		else{
			alert("Answer must be 'yes or 'no'");
		}
		
	}	
</script>
<body onload="load(); openTab(event, 'viewNetwork');">
	

<div class="box left" style="width: 30%; height: 75%; top: 1%;">
<div class="menu_box";>
<div class="w3-container">
  <ul class="w3-navbar w3-lightblue">
    <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'viewNetwork');">View Network</a></li>
    <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'addNetwork');">Add Network</a></li>
	  
  </ul>
	
  <div id="viewNetwork" class="w3-container w3-border tab">
	  
	  
   	<div  style="font-size: 20px; top: 92%">
				<p style="color: #29afc4;" id="htmlname" href = test.html></p>
</div>
	  <div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px; color: #10454e;" id="htmladdress" href = test.html></p>
</div>
	  <div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px; color: #10454e;" id="htmlquality" href = test.html></p>
</div>
	  <div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px; color: #79969a;" id="htmlkarma" href = test.html></p>
</div>
	  <div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px; color: #10454e;" id="htmltype" href = test.html></p>
</div>
	  <div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px; color: #10454e;" id="htmluser" href = test.html></p>
</div>
 </div>

  <div id="addNetwork" class="w3-container w3-border tab">
    <!-- ADD NETWORK TAB -->
	  
	  
	  
	  <form action="" onsubmit='postForm("../api.php/markers", "#registerform"); return false' id="registerform" method="post">

			<div style="font-size: 20px;">
				Name of the network
			</div>
			<div style="top: 12%; font-size: 20px;">
				<input type="text" name="name" class="tb5" value="">

			</div>
			<br/>
			<div style="font-size: 20px; top: 40%; left: 8%;">
				Physical adress of the network
			</div>
			<div style="font-size: 20px; top: 40%">
				<input value="" type="text" name="address" class="tb5">
			</div>
		  	<br/>
			<div style="font-size: 20px; top: 52%; left: 8%;">
				Quality(good, bad, etc)
			</div>
			<div  style="font-size: 20px; top: 52%">
				<input value="" type="text" name="quality" class="tb5">
			</div>
			<br/>
			<div style="font-size: 20px; top: 92%; left: 8%;">
				Customer only?(yes/no)
			</div>
			<div  style="font-size: 20px; top: 92%">
				<input value="yes" type="text" name="type" font="monospace" class="tb5">
			</div>
		  	<br/>
		  	<div style="font-size: 20px; top: 64%"> 
			Picture(optional)<br/>
			<input id="file" type="file" name="file" font="monospace" class="tb3"> 
   			
			</div>
		  	<br/>
			<div  style="font-size: 20px; top: 92%">
				<input type="hidden" id="latval" name="lat" />
			</div>
		  	<div  style="font-size: 20px; top: 92%">
				<input type="hidden" id="lonval" name="lng"/>
			</div>
			<br/>
			<div style="font-size: 20px; margin-top: 5px;">

				<input onclick="<?php echo $uploadHandler ?>" style="margin-top: 5px;" type="submit" value="Submit" name="register" class="tb4">

			
</div>
		  
		  
		  
		  
		<!--  <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post"> 
			 			  
		  </form> 
		-->
			
</form>
	  
	 
	  
  </div>
</div>

			
		<!--</form>-->

	</div>
	</div>
	
	
	
	
	
	
<script>
function openTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-cyan", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " w3-cyan";
}
submitForms = function(){
    document.getElementById("Upload").submit();
}

</script>
	
	
	
	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<div id="map" style="width: 70%; height: 950px; left:30%"></div>
	
	<span class="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
