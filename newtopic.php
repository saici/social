<?php
include "includes/connect.php";
include "header.php";
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

							<div class="well">
									<h4>topic naam</h4>	
											<form action="newtopicsend" method="POST">
												<div class="form-group">
													<textarea class="form-control" name="opname" id="post" rows="1"></textarea>
												</div>
							</div>
							
							<div class="well">
									<h4>message</h4>
											<form action="newtopicsend" method="POST">
												<div class="form-group">
													<textarea class="form-control" name="optext" id="post" rows="10"></textarea>
												</div>
				</div>
		</div>
</div>