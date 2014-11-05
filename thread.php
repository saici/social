<?php
	include "includes/connect.php";
	include 'header.php';
?>

<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

					<?php
						$thread= mysqli_query($con,"SELECT * FROM topics WHERE topicname = 'qwe' ");
					
						while($row=mysqli_fetch_array($thread) ){
							echo $row['message'] . "<br>";
						}
					?>
			
			
			
			</div>
		
		</div>
		
	</div>