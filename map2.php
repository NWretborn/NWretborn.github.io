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
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
<body onload="load()">
	
	
	
	
<!--	<div class="box left" style="width: 30%; height: 75%;"> -->
	<!--	<div class="menu_box";> -->
<div class="w3-container">
  <h2>Active Tabs</h2>
  <p>Click on the links below:</p>

  <ul class="w3-navbar w3-black">
    <li><a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'London');">London</a></li>
    <li><a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Paris');">Paris</a></li>
    <li><a href="javascript:void(0)" class="tablink" onclick="openCity(event, 'Tokyo');">Tokyo</a></li>
  </ul>

  <div id="London" class="w3-container w3-border city">
    <h2>London</h2>
    <p>London is the capital city of England.</p>
  </div>

  <div id="Paris" class="w3-container w3-border city">
    <h2>Paris</h2>
    <p>Paris is the capital of France.</p> 
  </div>

  <div id="Tokyo" class="w3-container w3-border city">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
			
		<!--</form>-->

	
	
	
	
	
	
	
	
	
	
	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<div id="map" style="width: 70%; height: 950px; left:30%"></div>
	
	<span class="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
