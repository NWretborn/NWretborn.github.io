<!--API key: AIzaSyB8X7FBSBxL3hUTo5HoOnYrX5MDzvGEIQA -->
<!DOCTYPE html>
<html>
<style>
	body{
		background-color: black;
		/* background-image: url("index_background.png"); */
		background-size:cover;
	}
	.logo{
		position: fixed;
		height:15vh;
		left:8%;
		bottom:8vw;
		transform: translate(-50%, 50%);
	}
</style>
<script type="text/javascript">
	function changePic(element, imageName) {
    	element.setAttribute('src', imageName);
	}
	
	function larger(element){
		var style = window.getComputedStyle(element),
		h = parseFloat(style.height),
		vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
		h = (h*1.2)/vH*100;
		element.style.height = h + 'vh';
	}
	
	
	function smaller(element){
		var style = window.getComputedStyle(element),
		h = parseFloat(style.height),
		vH = Math.max(document.documentElement.clientHeight, window.innerHeight || 0); // MOBILE SCALING!!!
		h = (h/1.2)/vH*100;
		element.style.height = h + 'vh';
	}
	
	function downloadUrl(phpsqlajax_genxml3.php,callback) {
 		var request = window.ActiveXObject ?
     		new ActiveXObject('Microsoft.XMLHTTP') :
     		new XMLHttpRequest;

 		request.onreadystatechange = function() {
   			if (request.readyState == 4) {
     				request.onreadystatechange = doNothing;
     				callback(request, request.status);
   				}
 	};

	request.open('GET', phpsqlajax_genxml3.php, true);
 	request.send(null);
	}
	
</script>
<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
</head>

<body>
	downloadUrl("phpsqlajax_genxml.php", function(data) {
  var xml = data.responseXML;
  var markers = xml.documentElement.getElementsByTagName("marker");
  for (var i = 0; i < markers.length; i++) {
    var name = markers[i].getAttribute("name");
    var address = markers[i].getAttribute("address");
    var type = markers[i].getAttribute("type");
    var point = new google.maps.LatLng(
        parseFloat(markers[i].getAttribute("lat")),
        parseFloat(markers[i].getAttribute("lng")));
    var html = "<b>" + name + "</b> <br/>" + address;
    var icon = customIcons[type] || {};
    var marker = new google.maps.Marker({
      map: map,
      position: point,
      icon: icon.icon
    });
    bindInfoWindow(marker, map, infoWindow, html);
  }
});
				     
				     var customIcons = {
  restaurant: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
  },
  bar: {
    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
  }
};

	<iframe
	style="position: absolute;
	display: block;
	margin-left: 49.5%;
	margin-right: 0;
	margin-top: 0;
	margin-bottom: 0;
	width: 50%;
	height: 99%;
	border: 1;"

 	 src="https://www.google.com/maps/embed/v1/search?key=AIzaSyB8X7FBSBxL3hUTo5HoOnYrX5MDzvGEIQA&q=record+stores+in+Seattle">
	
	</iframe>
	<img src="logo_gray.png" class="logo" 
		onmouseover="changePic(this, 'logo_blue.png'); larger(this);" 
		onmouseout="changePic(this, 'logo_gray.png'); smaller(this);"
		onclick="location.href='index.php';"
	>
</body>



</html>
