<?php
	include "includes/connect.php";
		if(isset($_POST['delete'])){
			$userid = $_SESSION['userid'];
			//mysqli_query($con, "DELETE FROM users WHERE ID='$userid'") or die(mysql_error($con));
			unset($userid);
	}
	SESSION_DESTROY();
	header ('Location: login.php?removed');
?>