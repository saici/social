<?php
	include 'connect.php';

	
		if(isset($_SESSION['userid'])){
				$user = $_SESSION['userid'];

				$photo = mysqli_real_escape_string($con, $_POST['bio']);
				
				mysqli_query($con, "UPDATE profile SET bio='$photo' WHERE ID = '$user'") or die(mysqli_error($con));
				header("Location: ../profile.php");
			

				
			}
		
		else{
			die('Error: please <a href="index.php">Sign in again</a>');
		}
	 

?> 
