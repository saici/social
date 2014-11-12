<?php
	include "../includes/connect.php";
		if(!empty($_POST['delete'])){
		
				$userid = $_SESSION['userid'];
			mysqli_query($con, "DELETE FROM users WHERE ID='$userid'") or die(mysql_error($con));
            mysqli_query($con, "DELETE FROM messages WHERE ID='$userid'") or die(mysql_error($con));
			unset($userid);
			
			
	SESSION_DESTROY();
	header ('Location: login.php?removed');
	}
	else{
		header ('Location: instellingen.php');	
	}
?>