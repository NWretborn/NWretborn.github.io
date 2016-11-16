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
	
	function downloadUrl(url,callback) {
 		var request = window.ActiveXObject ?
     		new ActiveXObject('Microsoft.XMLHTTP') :
     		new XMLHttpRequest;

 		request.onreadystatechange = function() {
   			if (request.readyState == 4) {
     				request.onreadystatechange = doNothing;
     				callback(request, request.status);
   				}
 	};

	request.open('GET', url, true);
 	request.send(null);
	}
	
</script>
<head>
	<meta http-equiv="Content-Language" content="sv">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>WiFinder</title>
</head>

<body>
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
