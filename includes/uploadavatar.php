<?php
	include 'connect.php';

	$target_dir = "../avatars";
	
	$uploadOk=1;
	
	if (file_exists($target_dir . $_FILES["uploadFile"]["name"])) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}	 
	if ($uploadFile_size > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}	 
	
		if(isset($_SESSION['userid'])){
			$user = $_SESSION['userid'];

				
				$target_dir = $target_dir . '/' . $user;
				echo $target_dir;
				
				move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir);
				
				$photo = "http://" . $_SERVER['SERVER_NAME'] . '/social/avatars/'. $user;
				
				mysqli_query($con, "UPDATE profile SET avatar='$photo' WHERE ID = '$user'") or die(mysqli_error($con));
				header("Location: ../index.php");
			

				
			}
		
		else{
			die('Error: please <a href="index.php">Sign in again</a>');
		}
	 

?> 
