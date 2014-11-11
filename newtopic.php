<?php

include "includes/connect.php";
include "header.php";
if(isset($_GET['topic'])){
	$thread = mysqli_real_escape_string($con, $_GET['topic']);
}
else{
	$thread = "NONE";
}
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

							<div class="well">
											<form action="newtopicsend.php" method="POST">
												<div class="form-group">
													<?php
														if($thread == "NONE"){
															echo'
																<input type="text" class="form-control" name="titelname" placeholder="Titel"><br />
																<select name="catergory" class="form-control">
																	<option value="School">School</option>
																	<option value="Niet-school">Niet school</option>

																</select>
																<input type="hidden" name="topicid" value="' . $thread . '" >
																';
														}
														else{
															echo'
																
																<input type="hidden" name="topicid" value="' . $thread . '" >
																';
														}
													?>
												</div>
					
									<div class="form-group">
										<textarea class="form-control" name="message" id="post" rows="10" placeholder="message"></textarea>
										
									</div>
									<input type="submit" class="btn btn-primary" value="Verzenden">
														<!-- Button trigger modal -->
														

												</form>
							
				</div>
		</div>
</div>
<?php include 'footer.php';?>
