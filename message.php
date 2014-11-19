<?php 
	include 'header.php';
		if(isset($_GET['id'])){
			$id = mysqli_real_escape_string($con, $_GET['id']);
		}
		else{
			die('Er is een fout opgetreden');
		}
		?>
		<!-- Page Content -->
    <div class="container">

        <div class="row">
<br />
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
				<div class="well">
				<?php
					
						
					mysqli_query($con, "DELETE FROM notifications WHERE url = 'message.php?id=$id'");
					
					$getpost = mysqli_query($con, "SELECT * FROM messages WHERE ID = '$id'")or die(mysqli_error($con));
					while($row = mysqli_fetch_array($getpost)){
						echo $row['message'];
						echo '<hr>';
						echo "Likes: " . $row['likes'];
					}

				?>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php';?>
