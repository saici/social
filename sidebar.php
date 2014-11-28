
<!-- Blog Sidebar Widgets Column -->
			
            <div class="col-md-4">

					<div class="page-header">
									<h1>Forum </h1>
								</div>
							
							<div class="well">
								<h4>Nieuw</h4>
								<ul class="list-group">
								<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1' AND category <>'comment' ORDER BY ID DESC LIMIT 5") or die(mysqli_error($con));
								
									
								while($row= mysqli_fetch_array($firsttopic))	{
										
										
										echo  '<li class="list-group-item">

										<a href="topic.php?id=' . $row['topicID']. '">' . $row['topicname'] . '</a>'
										
										. '</li>';
									
								}

							?>
				
								</ul>
								<a href="forum.php" class="btn btn-primary">Alle topic's weergeven</a>
							</div>
							<div class="well">
								<h4>Populair</h4>
								<ul class="list-group">
								<?php
								$topiclist = array();
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE category <>'comment'") or die(mysqli_error($con));
								
									
								while($row= mysqli_fetch_array($firsttopic))	{
									
									
										array_push($topiclist, $row['topicID']);
										
									
										
										
								}
								$topicorder = array_count_values($topiclist);
								
								
								foreach($topicorder as $key => $val){
								
											
											$secondtopic = mysqli_query($con, "SELECT * FROM topics WHERE topicname <> '' AND topicID = '$key'");
											while($row2 = mysqli_fetch_array($secondtopic)){
												echo  '<li class="list-group-item">

												<a href="topic.php?id=' . $row2['topicID']. '">' . $row2['topicname'] . '</a>'
										
												. '</li>';
											
										}
									}
							?>
				
								</ul>
								<a href="forum.php" class="btn btn-primary">Alle topic's weergeven</a>
							</div>
               

               
               
