<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<style>
	body{
		background-color: black;
		/* background-image: url("index_background.png"); */
		background-size:cover;
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
	
</script>
<head>
<meta http-equiv="Content-Language" content="sv">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>WiFinder</title>
<style type="text/css">
	#c{	text-align: center;	}
	#l{	text-align: left;	}
	#r{	text-align: right;	}
	
	/* Rounded Corner */
	.tb5 {
		background-color: #10454e;
		border:1px solid #10454e;
		border-radius:20px;
		font-size:1.5vw;
		font-family: monospace;
	}
	.tb4 {
		
		background-color: #10454e;
		border:0px solid #29afc4;
		border-radius:20px;
		font-size: 1.5vw;
	}
	.center{
		
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	.hCenter{
		left: 70%;
		transform: translate(-50%, 0);
	}
	div{
		font-size:1.5vw;
		position: fixed;
	}
	.box{
		height: 35vh;
		color: #79969a;
		font-family: monospace;
		background-color: black;
		width: 40vw;
		border: 2px solid #10454e;
		border-radius:10px;
		padding: 20px;
	}
	.tb4:hover{
		border:2px solid #29afc4;
		border-radius: 20px;
	}
	input:focus {
		border: 2px solid #29afc4;
		border-radius: 20px;
		outline: none;
	}
	.logo{
		position: fixed;
		height:15vh;
		left:8%;
		bottom:8vw;
		transform: translate(-50%, 50%);
	}
</style>
</head>

<body>

	<?php
		include('/afs/ltu.se/systemdata/www/students/nicvre-3/functions.php');
	?>

	<div class="center box">
			<div style="top: 12%; left: 8%">
				Username
			</div>
			<div class="hCenter" style="top: 12%">
				<input id="c" type="text" name="Fname" class="tb5">
			</div>
			<br/>
			<div style="top: 32%; left: 8%;">
				Password
			</div>
			<div class="hCenter" style="top: 32%">
				<input id="c" type="password" name="Fname" class="tb5">
			</div>
			<br/>
			<div style="top: 52%; left: 8%;">
				Repeat password
			</div>
			<div class="hCenter" style="top: 52%">
				<input id="c" type="password" name="Fname" class="tb5">
			</div>
			<br/>
			<div style="top: 72%; left: 8%;">
				E-mail
			</div>
			<div class="hCenter" style="top: 72%">
				<input type="text" name="Fname" id="c" font="monospace" class="tb5">
			</div>
			<br/><br/>
			<div class="center" style="top:100.5%">
			<form action="http://utbweb.its.ltu.se/~nicvre-3/WiFinder/confirmed.php" method="get">
				<input type="submit" value="Register!" name="register" class="tb4">
				</form>
			</div>
	</div>
	
	<img src="logo_gray.png" class="logo" 
		onmouseover="changePic(this, 'logo_blue.png'); larger(this);" 
		onmouseout="changePic(this, 'logo_gray.png'); smaller(this);"
		onclick="location.href='index.php';"
	>

	<?php
		$conn = new mysqli("utbweb.its.ltu.se", "nicvre-3", "Puppet54", "nicvre3db"); 

		if (!$conn) { 
			die('Could not connect: ' . mysql_error());  
			echo $conn->error;
		}

		if(isset($_GET['Message'])){
			popup($_GET['Message']);
		}

		if(isset($_POST['register'])){
			$stmt = $conn->prepare('CALL add_user(?,?,?,?,?,?,?,?)');
			$stmt->bind_param('ssssssss', 
				$username, 	$email, 		$name, 
				$address, 	$postalcode, 	$country, 
				$phone, 	$password
				);

			$username 	= $_POST["username"];
			$email		= $_POST["email"];
			$name 		= $_POST["name"];
			$address 	= $_POST["address"];
			$postalcode = $_POST["postalcode"];

			$country 	= $_POST["country"];
			$phone 		= $_POST["phone"];
			$password 	= $_POST["password"];
			$passwordrep= $_POST["passwordrep"];

				if($username == "" 
				or $email == "" 
				or $name == "" 
				or $address == "" 
				or $postalcode == "" 
				or $country == "" 
				or $password == "") { 
				header('Location: signup.php?Message='.urlencode('All fields must be filled!'));
			}
			else if($password != $passwordrep){
				header('Location: signup.php?Message='.urlencode('password missmatch'));
			}
			else{ 

				$stmt->execute();
				
				#$sql = "CALL add_user('$username','$email', '$name','$address', $postalcode,'$country',$phone,'$password')"; 
				#mysqli_query($conn,$sql);             
				if($conn->error){ 
					header('Location: signup.php?Message='.urlencode($conn->error));
				}       
				else{ 
					$_SESSION['A_C'] = "Account created!";
					header('Location: index.php');
				}

				//this had to be closed last
				$stmt->close();
			}
		}
		echo "</table>";      
		mysqli_close($conn);
	?>

</body>
</html>


