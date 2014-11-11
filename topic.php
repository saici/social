<?php


include "includes/connect.php";
include "header.php";
if(isset($_GET['id'])){
	$topic = mysqli_real_escape_string($con, $_GET['id']);
}
else{
	header("Location: forum.php");
	die();
}
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
				
						<?php
							
							$query = mysqli_query($con, "SELECT * FROM topics WHERE topicID = '$topic' ORDER BY ID ASC ") or die(mysqli_error($con));
							$numtopics = mysqli_num_rows($query);
							
							if($numtopics == 0){
								echo '
							<div class="well">
								Er is geen topic met deze gegevens gevonden...
							</div>';
									
							}
							while($row = mysqli_fetch_array($query)){
								$userid = $row['user'];
								$getusername = mysqli_query($con, "SELECT username FROM users WHERE ID = '$userid' ");
								while($usernamerow = mysqli_fetch_array($getusername)){
									$username = $usernamerow['username'];
								}
								if($row['firsttopic'] == 1){
								echo '
								<br />
								<div class="page-header">
									<h1>' . $row['topicname'] .' <small> ' . $row['category'] .'</small></h1>
								</div>
								<a href="newtopic.php?topic=' . $row['topicID'] .'"class="btn btn-primary">Reageer</a> <br />
								<br />
								';
								}
								echo'
								<div class="well">
									<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $row['user'] .'">
											<img src="http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png" width="64" alt="..."> <br /><center>' . ucfirst($username) . '</center>
										</a>
									<div style="padding-left: 10px;" class="media-body">
										' . ucfirst($row['message']) . '
										</div>
									</div>
								</div>
								';
							}
							
						?>

				</div>
					<?php include 'sidebar.php';?>


		</div>
		
</div>
			
