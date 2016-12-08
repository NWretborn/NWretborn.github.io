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
	<script src="libs/map.js"></script>
	<script src="libs/std.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ&libraries=places"async defer></script>
<body onload="load()">
	
	
	
	
<div class="box left" style="width: 30%; height: 75%; top: 1%;">
<div class="menu_box";>
<div class="box left" style="width: 30%; height: 2%; top: 1%;">
<div class="w3-container">
  <ul class="w3-navbar w3-lightblue">
    <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'viewNetwork');">View Network</a></li>
    <li><a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'addNetwork');">Add Network</a></li>
  </ul>
		</div>
  <div id="viewNetwork" class="w3-container w3-border tab">
    <h2>London</h2>
    <p>London is the capital city of England.</p>
  </div>

  <div id="addNetwork" class="w3-container w3-border tab">
    <h2>Paris</h2>
    <p>Paris is the capital of France.</p> 
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
