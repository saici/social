<?php
	include 'connect.php';
	
	$commentid = 'c' . mysqli_real_escape_string($con, $_POST['commentid']);
	$commentuser = $_SESSION['userid'];
	$comment = mysqli_real_escape_string($con, $_POST['post']);
	
	mysqli_query($con, "INSERT INTO topics(message, category, datumfirst, user, topicID) VALUES('$comment', 'comment',NOW(), '$commentuser', '$commentid')") or die(mysqli_error($con));
	
	
?>
