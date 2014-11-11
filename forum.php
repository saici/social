<?php
include "includes/connect.php";
include "header.php";
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

							<div class="well">
											<form action="newtopic.php" method="POST">
									
										<!-- Button trigger modal -->
									<input type="submit" class="btn btn-primary" value="Nieuw Topic">
										</form>
										
							</div>
							
							<div class="well">
								<h4>School</h4>
								<ul class="list-group">
								<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1' AND category='school'");
								
									
								while($row= mysqli_fetch_array($firsttopic))	{
										
										
										echo  '<li class="list-group-item">

										<a href="topic.php?id=' . $row['topicID']. '">' . $row['topicname'] . '</a>'
										
										. '</li>';
									
								}
								
								
							
								
							?>
				
								</ul>
							</div>
							

		</div>
		
		
		<?php
include "sidebar.php";
?>
</div>
	
	
