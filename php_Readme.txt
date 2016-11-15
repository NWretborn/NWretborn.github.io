<?php
	session_start();
?>


<?php
		include('/afs/ltu.se/systemdata/www/students/nicvre-3/functions.php');
	?>
	
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