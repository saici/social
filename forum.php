<?php
include "includes/connect.php";
include "header.php";
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <?php if(!isset($_GET['cat'])){ ?>
            <div class="col-lg-8">
								<div class="page-header">
									<h1>Forum <a href="newtopic.php" style="float: right;"  class="btn btn-primary" value="Nieuw Topic">Nieuw Topic</a></h1>
								</div>
							
							<div class="well">
								<h4>School</h4>
								<ul class="list-group">
								<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1' AND category='school' ORDER BY ID DESC LIMIT 5") or die(mysqli_error($con));
								
									
								while($row= mysqli_fetch_array($firsttopic))	{
										
										
										echo  '<li class="list-group-item">

										<a href="topic.php?id=' . $row['topicID']. '">' . $row['topicname'] . '</a>'
										
										. '</li>';
									
								}
								
								
							
								
							?>
				
								</ul>
								<a href="forum.php?cat=school" class="btn btn-primary">Meer topic's weergeven</a>
							</div>
							<div class="well">
								<h4>Niet-school</h4>
								<ul class="list-group">
								<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1' AND category='Niet-school' ORDER BY ID DESC LIMIT 5") or die(mysqli_error($con));
								
									
								while($row= mysqli_fetch_array($firsttopic))	{
										
										
										echo  '<li class="list-group-item">

										<a href="topic.php?id=' . $row['topicID']. '">' . $row['topicname'] . '</a>'
										
										. '</li>';
									
								}
								
								
							
								
							?>
				
								</ul>
								<a href="forum.php?cat=nietschool" class="btn btn-primary">Meer topic's weergeven</a>
							</div>
							

		</div>
		<?php }
		
		else{
			$category = mysqli_real_escape_string($con, $_GET['cat']);
			?>
			            <div class="col-lg-8">
								<div class="page-header">
									<h1>Forum <a href="newtopic.php" style="float: right;"  class="btn btn-primary" value="Nieuw Topic">Nieuw Topic</a></h1>
								</div>
							
							<div class="well">
								<h4><?php if($category == 'school'){echo 'School';}else{echo 'Niet School';}?></h4>
								<ul class="list-group">
								<?php
								$firsttopic=mysqli_query($con,"SELECT * FROM topics WHERE firsttopic='1' AND category='$category'") or die(mysqli_error($con));
								
									
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
		}
		
		
include "sidebar.php";
?>
</div>
	<?php include 'footer.php';?>
	
