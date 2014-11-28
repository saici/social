<?php
	ini_set('display_errors', '1');
	include '../includes/connect.php';
	include '../includes/salt.php';

	if(isset($_POST['new']) && isset($_POST['new1']) && isset($_SESSION['userid'])){
		$firstpass = mysqli_real_escape_string($con, $_POST['new']);
		$secondpass = mysqli_real_escape_string($con, $_POST['new1']);
		
		$password = $firstpass;
		$username = $_SESSION['userid'];
		$realuser = $_SESSION['user'];
		
		if($firstpass == $secondpass){
			$query = mysqli_query($con, "SELECT email,registrationdate FROM users WHERE id = '$username'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				$email = $row['email'];
				$date = $row['registrationdate'];
				$date = date("YmdHis", strtotime($date));
				$password = salt($realuser, $password, $email, $date);
				mysqli_query($con, "UPDATE users SET password = '$password' WHERE ID = '$username'");
				unset($_SESSION['userid']);
				unset($_SESSION['user']);
				header ('Location: ../index.php');
			}
		}
	}

	else{
		header ('Location: ../instellingen.php?failed');
	}
?>

