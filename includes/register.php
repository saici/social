<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
	//includes
	include 'connect.php';
	include 'salt.php';
	
	if(isset($_POST['registerusername']) && isset($_POST['registerpassword']) && isset($_POST['registeremail'])){
		//escape strings
		
		$username = mysqli_real_escape_string($con, $_POST['registerusername']);
		$password = mysqli_real_escape_string($con, $_POST['registerpassword']);
		$email = mysqli_real_escape_string($con, $_POST['registeremail']);
		
		//check if email is free
		$query = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'")or die(mysqli_error($con));
		if(mysqli_num_rows($query) == 0){
			$num = 1;
			//generate random number as ID
			while($num){
				$id = mt_rand(1000000000, 9999999999);
				$query = mysqli_query($con, "SELECT ID FROM users WHERE ID = '$id'")or die(mysqli_error($con));
				$num = mysqli_num_rows($query);
				
			}
			//hash and salt password
			$date = date("YmdHis");
		
			$password = salt($username, $password, $email, $date);
			
			//insert in database
			mysqli_query($con, "INSERT INTO users(username, password, registrationdate, email, active, ID) VALUES('$username', '$password',NOW(), '$email', '1', '$id')") or die(mysqli_error($con));
			header("Location: login.php?register");
		}
		else{
			//Mail already exist in database
			header("Location: login.php?emailfail");
			die('Nomail');
		}
		
	}
	else{
		//fail or nothing inserted in form
		header("Location: login.php?fail");
	}
?>

