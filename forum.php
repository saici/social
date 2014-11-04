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
											
									<div class="form-group">
									<h4>maak een nieuwe topic aan
									</div>
										<!-- Button trigger modal -->
									<input type="submit" class="btn btn-primary" value="Aanmaken">
										</form>
							<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1'");
								$numvalue = mysqli_num_rows($firsttopic);
								echo $numvalue;
								
							?>
				</div>
		</div>
		
		
		<?php
include "sidebar.php";
?>
</div>
	
	
