<?php
	include 'includes/connect.php';
	if(isset($_GET['hash'])){
		$hash = mysqli_real_escape_string($con, $_GET['hash']);
		$checkhash = mysqli_query($con, "SELECT * FROM activate WHERE hash = '$hash'");
		$numhash = mysqli_num_rows($con, $checkhash);
		if($numhash == 1){
			while($row = mysqli_fetch_array($checkhash)){
				$user = $row['user'];
				mysqli_query($con, "UPDATE users SET active='1' WHERE ID = '$user'");
				headers("Location: index.php");
			}
		}
		else{
			die('Er is een FATALE fout opgetreden, mogelijk is uw account al geactiveerd. Ga dan naar <a href="index.php">De homepagina</a>.');
		}

	}
?>
