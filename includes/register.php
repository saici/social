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
		
		
			
			

			$numid = 1;
			while($numid){
				$date = date("YmdHis");
				$password = salt($username, $password, $email, $date);

				$id = hexdec(substr(hash('SHA512', $username . $date),0, 6));
				$checkid = mysqli_query($con, "SELECT * FROM users WHERE ID = '$id'");
				$numid = mysqli_num_rows($con, $checkid);
			}
			
			$query = "INSERT INTO users (username, password, email, registrationdate, ID) VALUES ('$username', '$password', '$email', '$date', '$id')";
			mysqli_query($con, $query) or die (mysqli_error($con));
			mysqli_query($con, "INSERT INTO profile (user, avatar, bio, banner, ID) VALUES ('$id', 'NONESET', 'NONESET', 'NONESET' , '$id')") or die(mysqli_error($con));
			$activatehash = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20));
			mysqli_query($con, "INSERT INTO activate (user, hash) VALUES ('$id', '$activatehash')");
			// multiple recipients
$to  = $email;

// subject
$subject = 'Activeer uw account';

// message
$message = '
<p>Activeer uw account door op <a href="http://185.13.226.55/social/activate.php?hash=' . $activatehash . '">deze link</a> te klikken.</p>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: ' . $email . "\r\n";
$headers .= 'From: Social College <noreply@socialcollege.tk>' . "\r\n";


// Mail it
mail($to, $subject, $message, $headers);


			header("location: ../login.php?register");
		
		
	}
	else{
		header("location: ../login.php?regfailed#about");
	}
	
?>

