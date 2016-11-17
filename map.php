<!DOCTYPE html>
<html>

<head>
  <title>WiFinder</title>
  <link rel="stylesheet" type="text/css" href="libs/wifinder.css">
</head>

<script src="libs/std.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJR14TQYMP-yBtsSpULmOe0hM7bHPWasQ"
        type="text/javascript"></script>
<script src="libs/map.js"></script>


<body onload="load()">
  <div id="map" style="width: 70%; height: 1000px;"></div>
  
<img src="logo_gray.png" class="logo" 
	onmouseover="changePic(this, 'logo_blue.png'); larger(this);" 
	onmouseout="changePic(this, 'logo_gray.png'); smaller(this);"
	onclick="location.href='index.php';"
>
</body>

</html>
