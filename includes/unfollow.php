<?php
	include 'connect.php';
	
	if(isset($_SESSION['userid'])){
		if(isset($_POST['user'])){
			$user = $_SESSION['userid'];
			$adduser = mysqli_real_escape_string($con, $_POST['user']);
			mysqli_query($con, "DELETE FROM followers WHERE user='$user' AND follows='$adduser'");
			header("Location: ../profile.php?id=" . $adduser);
		} 
		else{
			die('Error');
		}
	}
		else{
			die('Error');
		}
?>
