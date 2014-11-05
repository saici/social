<?php
include "includes/connect.php";

if(isset($_POST['titelname']) and isset($_POST['message']) and isset ($_POST['catergory'])){
	

	$titelname = mysqli_real_escape_string($con,$_POST['titelname']);
	$message = mysqli_real_escape_string($con,$_POST['message']);
	$category= mysqli_real_escape_string($con,$_POST['catergory']);
	$user = $_SESSION['userid'];
	$id = 1;
	
	while($id){
		$topicid = mt_rand(100000, 999999);
		$checkiffree = mysqli_query($con, "SELECT * FROM topics WHERE topicid = '$topicid'");
		$id = mysqli_num_rows($checkiffree);
	}
	
	$messagesend= mysqli_query($con, "INSERT INTO topics ( topicname,message,firsttopic,category,user,datumfirst,datumlast,topicID) VALUES('$titelname','$message','1','$category', '$user', NOW() ,  NOW() , '$topicid' ) ") or die ("wtf waarom werkt het niet" . $con->connect_error);
	
	
	}

//header ('location: forum.php');
?>