<?php
if(isset($_POST['bericht'])){
	include 'includes/connect.php';
	
	$person=$_POST['person'];
	$user=$_SESSION['userid'];
	$bericht=mysqli_real_escape_string($con,$_POST['bericht']);
	mysqli_query($con,"INSERT INTO mail (message,touser,user,datesend) VALUES('$bericht','$person','$user', NOW() )");

}

header ('location: mailperson.php?person=' . $person);
?>