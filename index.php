<?php 
	include 'header.php';
	$query = mysqli_query($con, "SELECT * FROM test");
	while($row = mysqli_fetch_array($query)){
		echo $row['test'];
	}
?>
	index.php
<?php
	include 'footer.php';
?>