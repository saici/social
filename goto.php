<?php 
	include 'includes/connect.php';
	
	if(isset($_SESSION['userid'])){
		if(isset($_GET['ref'])){
			$ref = mysqli_real_escape_string($con, $_GET['ref']);
			$query = mysqli_query($con, "SELECT * FROM notifications WHERE ID = '$ref'");
			while($row = mysqli_fetch_array($query)){
				$url = $row['url'];
				mysqli_query($con, "DELETE FROM notifications WHERE ID = '$ref'");
				header("Location: " . $url);
			}
		}
	}
