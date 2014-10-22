<?php 
	include 'header.php';
	
	?>
	
	<?php
	if(isset($_GET['id'])){
		
		$profileuser = mysqli_real_escape_string($con, $_GET['id']);

	}
	else{
		$profileuser = $_SESSION['userid'];

	}
	
		$getname = mysqli_query($con, "SELECT username FROM users WHERE id = '$profileuser'");
		$getinfo = mysqli_query($con, "SELECT * FROM profile WHERE user = '$profileuser'");
		while($row = mysqli_fetch_array($getname)){
			$profileusername = $row['username'];
		}
		while($row = mysqli_fetch_array($getinfo)){
			
			?>
				<?php echo '<header class="image-bg-fluid-height" style="background-image: url(' . $row['banner'] . ')">'; ?>
       <?php echo '<img img-responsive img-center src="' . $row['avatar'] . '" width="128px" height="128px">'; ?>
    </header>
    

			<?php
			$bio = $row['bio'];
		}
		echo '<br />';
					?>
			    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
					
					    <div class="media">
				<div class="well">
					<h3>Over <?php echo $profileusername?></h3>
                    <a class="pull-left" href="#"></a><?php echo $bio;?>
				
				</div>
				<div class="well">
					<h3>Foto's van <?php echo $profileusername?></h3>
                    <?php 
						$query2 = mysqli_query($con, "SELECT * FROM messages WHERE ID = '$profileuser' AND photo = '1'");
						$numphotos = mysqli_num_rows($query);
						if(!$numphotos == 0){
							while($row = mysqli_fetch_array($query2)){
								echo $row['message'];
							}
						}
						else{
								echo 'Geen foto\'s gevonden.';
							}
							
						
                    ?>
				
				</div>
			</div>
						</div>

			        <div class="container">

                <div class="col-lg-9">
			<?php
		$gettimeline = mysqli_query($con, "SELECT * FROM messages WHERE user = '$profileuser' ORDER BY messagedate") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($gettimeline)){

			echo '
				<div class="media">
				<div class="well">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" width="64" src="http://www.phantomshockey.com/wp-content/uploads/2014/07/profile-icon.png
" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">' . ucfirst($profileusername) . '
                            <small>2014-10-21 13:28:13</small>
                        </h4>
                       ' . $row['message'] . '<br><a href="index.php?re=test&amp;user=1">Repost</a>
                    </div>
                </div>
                </div>
			';

			
		
		}
					?>
			               </div>
            </div>
        </div>
    </section>
			<?php
	include 'footer.php';
?>


	