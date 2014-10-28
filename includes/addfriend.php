<?php
	include 'connect.php';
	
	if(isset($_SESSION['userid'])){
		if(isset($_POST['user'])){
			$user = $_SESSION['userid'];
			$adduser = mysqli_real_escape_string($con, $_POST['user']);
			mysqli_query($con, "INSERT INTO followers(user, follows) VALUES('$user', '$adduser')");
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
