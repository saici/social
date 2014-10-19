<?php 
	include 'header.php';
	
	if(isset($_GET['id'])){
		
		$profileuser = mysqli_real_escape_string($con, $_GET['id']);
		$getname = mysqli_query($con, "SELECT username FROM users WHERE ");
		$getinfo = mysqli_query($con, "SELECT * FROM profile WHERE user = '$profileuser'");
		while($row = mysqli_fetch_array($getinfo)){
			echo '<img src="' . $row['avatar'] . '" width="64px" height="64px">';
			echo $row['bio'];
		}
		echo '<br />';
		$gettimeline = mysqli_query($con, "SELECT * FROM messages WHERE user = '$profileuser' ORDER BY messagedate") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($gettimeline)){
			echo $row['user'];
			echo $row['message'];
		}
	}
	else{
		header("location: index.php");
	}
	include 'footer.php';
?>
