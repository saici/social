<?php
		
		include ('includes/connect.php');
	
		if($_POST['like']){
		$likeid = mysqli_real_escape_string($con, $_POST['like']);
		
		$user = $_SESSION['userid'];

		$query = mysqli_query($con, "SELECT * FROM likes WHERE user = '$user' AND message = '$likeid' AND type='1'");
		if(mysqli_num_rows($query) == 0){
			mysqli_query($con, "UPDATE messages SET likes = likes + 1 WHERE ID = '$likeid'") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO likes(user, message, type) VALUES('$user', '$likeid', '1')") or die(mysqli_error($con));
			$getusername = mysqli_query($con, "SELECT username FROM users WHERE ID = '$user'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($getusername)){
				$usernameresult = ucfirst($row['username']);
			}
			$getreceiver = mysqli_query($con, "SELECT user FROM messages WHERE ID = '$likeid'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($getreceiver)){
				$touser = $row['user'];
			}
			$message = $usernameresult . " heeft je bericht geliked!";
			
			mysqli_query($con, "INSERT INTO notifications(user, touser, date, img, url, type) VALUES('$user', '$touser',NOW(), '1', 'message.php?id=$likeid', 'like')") or die(mysqli_error($con));
			echo '1';
		}
		else{
			mysqli_query($con, "UPDATE messages SET likes = likes - 1 WHERE ID = '$likeid'") or die(mysqli_error($con));
			mysqli_query($con, "DELETE FROM likes WHERE user = '$user' AND message = '$likeid' AND type='1'") or die(mysqli_error($con));
			
		}
	}
	
	

	
?>
