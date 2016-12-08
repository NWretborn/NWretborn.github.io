<!DOCTYPE html>
<html>
<!-- http://stackoverflow.com/questions/15792655/add-marker-to-google-map-on-click -->
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    	<meta charset="utf-8">

	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
</head>
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
<body onload="load()">
	
	
	
	
	<div class="box left" style="width: 30%; height: 75%;">
		<div class="text_box">
	
<ul class="w3-navbar w3-black">
  <li><a href="javascript:void(0)" onclick="openCity('View Network')">View_network</a></li>
  <li><a href="javascript:void(0)" onclick="openCity('Add Network')">Add_network</a></li>
</ul>

<div id="View_network" class="w3-container city">
  <h2>VIEW</h2>
  <p>MENY</p>
</div>

<div id="Add_network" class="w3-container city">
  <h2>ADD</h2>
  <p>MENY</p> 
</div>

<script>
openTab("View_network")
function openTab(tabName) {
    var i;
    var x = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(tabName).style.display = "block";  
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
