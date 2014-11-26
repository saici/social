<?php
	include 'includes/connect.php';
	include 'header.php';
	
	$userid = $_SESSION['userid'];
	$showmsg = mysqli_query($con, "SELECT * FROM mail WHERE touser = '$userid' ")  or die ("error");  
	//print_r($showmsg);
	<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
	while($row=mysqli_fetch_array($showmsg)){
			echo $row['message'];
	}
	unset($userid);
	?>
	
</div>
</div>
</div>
