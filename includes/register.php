
<?php 

	include 'connect.php';
	include 'salt.php';
	$username = mysqli_real_escape_string($con,$_POST['registerusername']);
	$password = mysqli_real_escape_string($con,$_POST['registerpassword']);
	$email = mysqli_real_escape_string($con,$_POST['registeremail']);
	$weburl = mysqli_real_escape_string($con,$_POST['registerwebname']);
	$webname = mysqli_real_escape_string($con,$_POST['registerurl']);
	
	$checkusername = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($con));
	$numusername = mysqli_num_rows($checkusername);
	
	
	
	if($numusername == 0){
		
		
			$date = date("YmdHis");
			$password = salt($username, $password, $email, $date);

			$numid = 1;
			while($numid){
				$id = hexdec(substr(hash('SHA512', $username . $date),0, 6));
				$checkid = mysqli_query($con, "SELECT * FROM users WHERE ID = '$id'");
				$numid = mysqli_num_rows($con, $checkid);
			}
			
			$query = "INSERT INTO users (username, password, email, registrationdate, ID) VALUES ('$username', '$password', '$email', '$date', '$id')";
			mysqli_query($con, $query) or die (mysqli_error($con));
			mysqli_query($con, "INSERT INTO profile (user, avatar, bio, banner, ID) VALUES ('$id', 'NONESET', 'NONESET', 'NONESET' , '$id')") or die(mysqli_error($con));
			
			header("location: ../login.php?register");
		
		
	}
	else{
		header("location: ../login.php?regfailed#about");
	}
	
?>

