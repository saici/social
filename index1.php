<?php 
	include 'header.php';
	$query = mysqli_query($con, "SELECT * FROM test");


	if(isset($_SESSION['user'])){
		?>
		<a href="login.php?logout">Log uit</a><br />
		<?php
		include 'timeline.php';
	}
	else{
		
		include 'login.php';
	}
	

	include 'footer.php';
?>
