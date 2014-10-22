<?php
		include 'header.php';
if(isset($_SESSION['user'])){

		include 'delete1.php';
		
	}
	else{
		header("location: index.php");
	}

	?>
	