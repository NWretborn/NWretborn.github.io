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
	<div class="w3-container">
  <h2>Tabs</h2>
  <p>Tabs are perfect for single page web applications, or for web pages capable of displaying different subjects. Click on the links below.</p>
</div>

<ul class="w3-navbar w3-black">
  <li><a href="javascript:void(0)" onclick="openCity('London')">London</a></li>
  <li><a href="javascript:void(0)" onclick="openCity('Paris')">Paris</a></li>
  <li><a href="javascript:void(0)" onclick="openCity('Tokyo')">Tokyo</a></li>
</ul>

<div id="London" class="w3-container city">
  <h2>London</h2>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="w3-container city">
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="w3-container city">
  <h2>Tokyo</h2>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
openCity("London")
function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
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
