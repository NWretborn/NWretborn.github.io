<html>

<head>
	<title>WiFinder</title>
	<link rel="stylesheet" type="text/css" href="libs/wifinder.css">
</head>

<body>
	<div class="about_box center" style="height:70vh;">
	<span class="text_box center">
	<h1>API Documentation</h1>
	<hr>
	<section id="adduser">
		<h2>adduser</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>POST</p>
		<h5>Sample Call</h5>
		<p> $.ajax({
    url: "api.php/adduser",
    dataType: "json",
    type : "POST",
    success : function(r) {
      console.log(r);
    }
  });</p>
	</section>
	<hr>
	<section id="addwifi">
		<h2>addwifi</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p>GET</p>
		</section>
	<hr>
	<section id="deletewifi">
		<h2>deletewifi</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p>GET</p>
	</section>
	<hr>
	<section id="wifipic">
		<h2>wifipic</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p>GET</p>
	</section>
	<hr>
	<section id="login">
		<h2>login</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p>GET</p>
	</section>
	<hr>
	<section id="logout">
		<h2>logout</h2>
		<p>Adds a user via a json object</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p>GET</p>
	</section>
	</span>
	</div>
	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
