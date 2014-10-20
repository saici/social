<?php 
	include 'header.php';
	$query = mysqli_query($con, "SELECT * FROM test");


	if(isset($_SESSION['user'])){

		include 'timeline.php';
		
	}
	else{
		
		include 'login.php';
	}
	

	include 'footer.php';
?>
