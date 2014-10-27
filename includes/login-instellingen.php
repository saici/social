<?php 
	include 'connect.php';
	include 'salt.php';
	
	$username = $_SESSION['user'];
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$checkvalue = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	$numvalue = mysqli_num_rows($checkvalue);
	if($numvalue == 1){
		while($row = mysqli_fetch_array($checkvalue)){
			$email = $row['email'];
			$date = date("YmdHis" ,strtotime($row['registrationdate']));
			
			$password = salt($username, $password, $email, $date);
			
			$checkpassword = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysqli_error($con));
			$numpass = mysqli_num_rows($checkpassword);
			
			if($numpass == 1){
				$success = 1;
			}
			else{
				
				$success = 0;
				
			}
		}
	}
	else{
		
	}
	
?>
