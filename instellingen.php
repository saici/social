<?php
		include 'header.php';
if(isset($_SESSION['user'])){

		include 'deleteform.php';
		include 'wwform.php';
	}
	else{
		header("location: index.php");
	}

	?>
	