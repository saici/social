<?php 
	//include 'header.php';
	include 'includes/connect.php';
	if(isset($_GET['q'])){
		$q = "%" . mysqli_real_escape_string($con, $_GET['q'])  . '%';
		$query = mysqli_query($con, "SELECT ID FROM users WHERE username = LIKE('$q')") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($query)){
			echo $row['ID'];
		}
	}
	include 'footer.php';
?>
