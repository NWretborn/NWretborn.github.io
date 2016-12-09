<!DOCTYPE html>
<html>
<!-- http://stackoverflow.com/questions/15792655/add-marker-to-google-map-on-click -->
	
	
	
	
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    	<meta charset="utf-8">

	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>
	<style>
.tab {display:none;}
</style>
	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
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
		var type = jsonOUT['type'];
		if( type == 'open' || type == 'closed'){
			var jsonSTR = JSON.stringify(jsonOUT);
			$.ajax({
				type: "POST",
				url: "./"+path,
				data: jsonSTR,
				success: function(){alert("Network submitted!");},
				dataType: "json",
				contentType : "application/json"
			});
		}
		else{
			alert("Network must be 'open' or 'closed'");
		}
	}	
</script>
<body onload="load()">
	
	
	
	
<div class="box left" style="width: 30%; height: 75%; top: 1%;">
<div class="menu_box";>
<div class="w3-container">
  <ul class="w3-navbar w3-lightblue">
   <!-- <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'viewNetwork');">View Network</a></li> -->
    <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'addNetwork');">Add Network</a></li>
  </ul>
 <!-- <div id="viewNetwork" class="w3-container w3-border tab"> -->
    <!-- VIEW NETWORK TAB -->
 <!-- </div> -->

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
				Type of network(open/closed)
			</div>
			<div  style="font-size: 20px; top: 92%">
				<input value="open" type="text" name="type" font="monospace" class="tb5">
			</div>
		  	<br/>
			<div style="font-size: 20px; top: 92%; left: 8%;">
				Latitude & Longitude(click on map to set)
			</div>
			<div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px;" id="lat" href = test.html></p>
				<input value="open" type="hidden" name="lat" font="monospace" class="tb5" id="lat">
			</div>
		  	<div  style="font-size: 20px; top: 92%">
				<p style="font-size: 20px;" id="lon" href = test.html></p>
				<input value="open" type="hidden" name="lng" font="monospace" class="tb5" id="lon">
			</div>
			<br/>
			<div style="font-size: 20px; margin-top: 5px;">

				<input style="margin-top: 5px;" type="submit" value="Submit" name="register" class="tb4">

</div>

			
</form>
	  
	  
	  
	  
	  
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
</script>
			
		<!--</form>-->

	</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<div id="map" style="width: 70%; height: 950px; left:30%"></div>
	
	<span class="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
