<?php
include "includes/connect.php";

if(isset($_POST['titelname']) and isset($_POST['message']) and isset ($_POST['catergory'])){
		$titelname = mysqli_real_escape_string($con,$_POST['titelname']);	
		$message = mysqli_real_escape_string($con,$_POST['message']);
		$category= mysqli_real_escape_string($con,$_POST['catergory']);
		$user = $_SESSION['userid'];
		//TOPIC ID IS NIET NULL!!!! FIXXXXX
	if($_POST['topicid'] == "NONE"){
			$id = 1;
	
			while($id){
				$topicid = mt_rand(100000, 999999);
				echo $topicid;
				die();
				$checkiffree = mysqli_query($con, "SELECT * FROM topics WHERE topicid = '$topicid'");
				
				$id = mysqli_num_rows($checkiffree);
			}
		
			die();
			$messagesend= mysqli_query($con, "INSERT INTO topics ( topicname,message,firsttopic,category,user,datumfirst,datumlast,topicID) VALUES('$titelname','$message','1','$category', '$user', NOW() ,  NOW() , '$topicid' ) ") or die ("wtf waarom werkt het niet" . mysqli_error($con));
	}
	else{
			$topicid = $_POST['topicid'];
			$messagesend= mysqli_query($con, "INSERT INTO topics ( message,firsttopic,user,datumfirst,datumlast,topicID) VALUES('$message','0', '$user', NOW() ,  NOW() , '$topicid' ) ") or die ("wtf waarom werkt het niet" . mysqli_error($con));
	}
}

//header ('location: forum.php');
?>
