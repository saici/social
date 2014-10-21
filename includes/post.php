<?php
	include 'connect.php';
	if(isset($_POST['post'])){
		$post = mysqli_real_escape_string($con, $_POST['post']);
		echo $post;
		$user = $_SESSION['userid'];

		mysqli_query($con, "INSERT INTO messages(user,message, messagedate) VALUES ('$user', '$post', NOW())") or die(mysqli_error($con));
		
		unset($user);
		header("Location: ../index.php");
	}
	else{
		header("Location: ../index.php");
		
	}
?>
