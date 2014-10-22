<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_SESSION['user'])){
		include 'header.php';
	
		include 'timeline.php';
		include 'footer.php';
	}
	else{
		include 'login.php';
	}
	


?>
