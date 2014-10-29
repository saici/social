<?php
	include 'connect.php';

	$target_dir = "../images/";
	
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
			$extramessage = mysqli_real_escape_string($con, $_POST['desc']);
			$photo = "http://" .  $_SERVER['SERVER_NAME'] . "/social/images/" . $_FILES["uploadFile"]["name"];
			
			
			
			$query = mysqli_query($con, "SELECT * FROM messages WHERE user = '$user' ORDER BY ID DESC LIMIT 1") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				
				$loop = 1;
				while($loop == 1){
					$id = rand(10000,99999);
					$checkid = mysqli_query($con, "SELECT * FROM messages WHERE photo='$id'");
					if(mysqli_num_rows($checkid) == 0){
						$loop = 0;
					}
					else{
						
					}
				$target_dir = $target_dir . '/' . $id;
				$post = '<table><tr><td><img style="max-width: 560px; max-height: 315px;"  onclick="newimage(' . $id . ')"   data-target="#showimagemodal" data-toggle="modal"  src="http://' .  $_SERVER['SERVER_NAME'] . '/social/images/' . $id . '"></td></tr><tr><td>' . $extramessage . '</td></tr></table>';

				move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir);
				$photo = $id;
				echo $photo;
				mysqli_query($con, "INSERT INTO messages(user,message, messagedate, photo) VALUES ('$user', '$post', NOW(), '$photo')") or die(mysqli_error($con));
				header("Location: ../index.php");
			}

				
			}
		
		else{
			die('Error: please <a href="index.php">Sign in again</a>');
		}
	 

?> 
