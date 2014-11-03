<?php
	include 'includes/connect.php';
	if(isset($_GET['hash'])){
		$hash = mysqli_real_escape_string($con, $_GET['hash']);
		$checkhash = mysqli_query($con, "SELECT * FROM activate WHERE hash = '$hash'") or die(mysqli_error($con));
		$numhash = mysqli_num_rows($checkhash);
		echo $numhash;
		if($numhash == 1){
			while($row = mysqli_fetch_array($checkhash)){
				$user = $row['user'];
				mysqli_query($con, "UPDATE users SET active='1' WHERE ID = '$user'") or die(mysqli_error($con));
				mysqli_query($con, "DELETE FROM activate WHERE hash = '$hash'") or die(mysqli_error($con));
				headers("Location: index.php");
			}
		}
		else{
			die('Er is een FATALE fout opgetreden, mogelijk is uw account al geactiveerd. Ga dan naar <a href="index.php">De homepagina</a>.');
		}

	}
?>
