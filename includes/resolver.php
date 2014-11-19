<?php
	function resolveuser($user){
		
		include 'includes/connect.php';
	
		$query = mysqli_query($con, "SELECT username FROM users WHERE ID = '$user'") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($query)){
			return $row['username'];
		}
	}
?>
