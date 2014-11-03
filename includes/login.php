<?php 
	include 'connect.php';
	include 'salt.php';
	
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$checkvalue = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
	$numvalue = mysqli_num_rows($checkvalue);

	
	if($numvalue == 1){
		while($row = mysqli_fetch_array($checkvalue)){
			$email = $row['email'];
			$date = date("YmdHis" ,strtotime($row['registrationdate']));
			
			$password = salt($username, $password, $email, $date);
			
			$checkpassword = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ") or die(mysqli_error($con));
			$checkactive = mysqli_query($con, "SELECT active FROM users WHERE username = '$username'") or die(mysqli_error($con));
			
			while($checkactiverow = mysqli_fetch_array($checkactive)){
				$active = $checkactiverow['active'];
				if($active == 0){
					header("location: ../login.php?notactive");
					die();
				}
			}
			$numpass = mysqli_num_rows($checkpassword);
			
			if($numpass == 1){
				$_SESSION['user'] = $username;
				$_SESSION['userid'] = $row['ID'];
				header("location: ../index.php");
			}
			else{
				header("location: ../login.php?failed");
			}
		}
	}
	else{
		header("location: ../login.php?failed");
	}
	
?>
