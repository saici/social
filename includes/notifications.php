					 <?php
					 if(!isset($con)){
						 die('');
					 }
					 $user = $_SESSION['userid'];
					 
					 $query = mysqli_query($con, "SELECT * FROM notifications WHERE touser ='$user'");
					 if(mysqli_num_rows($query) == 0){
						echo "<center>Geen berichten!</center>";
					 }
					 while($row = mysqli_fetch_array($query)){

					 ?>
					  <li class="message-preview">
                            <a href="message.php?id=<?php echo $row['ID'];?>">
                                <div class="media" style="min-width: 300px;">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>
										<?php
											if($row['type'] == 1){
												echo 'Je bericht is geliked!';
											}
                                        ?>
                                        </strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $row['date'];?></p>
                                        <?php echo $row['notification'];?>
                                    </div>
                                </div>
                            </a>
                        </li>
					<?php
					}
					?>
