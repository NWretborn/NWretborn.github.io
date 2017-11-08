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
		</br>url: "api.php/adduser",
		</br>dataType: "json",
		</br>type : "POST",
		</br>success : function(r) {
		</br>console.log(r);
		</br>}
		</br>});</p>
	</section>
	<hr>
	<section id="addwifi">
		<h2>addwifi</h2>
		<p>Adds a wifi via a json object</p>
		<h5>Method</h5>
		<p>POST</p>
		<h5>Sample Call</h5>
		<p> $.ajax({
		</br>url: "api.php/addwifi",
		</br>dataType: "json",
		</br>type : "POST",
		</br>success : function(r) {
		</br>console.log(r);
		</br>}
		</br>});</p>
		</section>
	<hr>
	<section id="deletewifi">
		<h2>deletewifi</h2>
		<p>Allows user to delete wifi locations they added. The user named "Admin" can delete all wifi locations</p>
		<h5>Method</h5>
		<p>POST</p>
		<h5>Sample Call</h5>
		<p> $.ajax({
		</br>url: "api.php/deletewifi",
		</br>dataType: "json",
		</br>type : "POST",
		</br>success : function(r) {
		</br>console.log(r);
		</br>}
		</br>});</p>
	</section>
	<hr>
	<section id="login">
		<h2>login</h2>
		<p>Logs in a user</p>
		<h5>Method</h5>
		<p>GET</p>
		<h5>Sample Call</h5>
		<p> $.ajax({
		</br>url: "api.php/login",
		</br>dataType: "json",
		</br>type : "GET",
		</br>success : function(r) {
		</br>console.log(r);
		</br>}
		</br>});</p>
	</section>
	<hr>
	<section id="logout">
		<h2>logout</h2>
		<p>Logs out the current user</p>
		<h5>Method</h5>
		<p>POST</p>
		<h5>Sample Call</h5>
		<p> $.ajax({
		</br>url: "api.php/logout",
		</br>dataType: "json",
		</br>type : "POST",
		</br>success : function(r) {
		</br>console.log(r);
		</br>}
		</br>});</p>
	</section>
	</span>
	</div>
	
	<span id="logo" class="about" onclick="location.href='index.php'"> </span>
	<span class="cache" style="background: url(img/logo_blue.png)"></span>
</body>

</html>
