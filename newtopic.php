<?php
include "includes/connect.php";
include "header.php";
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

							<div class="well">
											<form action="newtopicsend.php" method="POST">
												<div class="form-group">
													<input type="text" class="form-control" name="titelname" id="post" rows="1" placeholder="Titel">
													<input type="text" class="form-control" name="catergory" id="post" rows="1" placeholder="Catergory">
												</div>
					
									<div class="form-group">
										<textarea class="form-control" name="message" id="post" rows="10" placeholder="message"></textarea>
										<input type="hidden" name="user" value="NONE">
									</div>
									<input type="submit" class="btn btn-primary" value="Verzenden">
														<!-- Button trigger modal -->
														

												</form>
							
				</div>
		</div>
</div>