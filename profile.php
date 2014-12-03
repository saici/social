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
				<?php
				if($row['banner']=="NONESET"){  
					$banner = "http://img4.wikia.nocookie.net/__cb20140603164657/p__/protagonist/images/b/b0/Blue-energy.jpg";
				}
				else{
					$banner = $row['banner'];
				} 
				if($row['avatar']=="NONESET"){  
					$avatar = "http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png";
				}
				else{
					$avatar = $row['avatar'];
				} 
				
				 echo '<header class="image-bg-fluid-height" style="background-image: url(' . $banner . ')">'; ?>
       <?php echo '<img img-responsive img-center class="well" style="float:middle;" src="' . $avatar . '" width="128px" height="128px"><br> <h1 style="Color: white;">' . ucfirst($profileusername). '</h1>' ; ?>
        
    </header>
    
   

			<?php
			$bio = $row['bio'];
		}
		echo '<br />';
					?>
			    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
					
					    <div class="media">
				<div class="well">
					<h3>Over <?php echo ucfirst($profileusername);?></h3>
                    <form action="includes/setbio.php" method="POST"><a class="pull-left" href="#"></a><div id="biografie"><?php if($bio == "NONESET"){ echo 'Je hebt nog geen biografie ingesteld. Dit kan je instellen op de instellingen pagina.'; } else { echo $bio; }?></div><?php if($_SESSION['userid'] == $profileuser){ echo '<a id="pencil" onclick="editbio()"><i class="fa fa-pencil"></i></a>'; }?></form>
					<hr>
					<?php 
					$user = $_SESSION['userid'];
					$checkiffollows = mysqli_query($con, "SELECT * FROM followers WHERE user='$user' AND follows = '$profileuser'") or die(mysqli_error($con));
					
					if(mysqli_num_rows($checkiffollows) == 0){
						if($profileuser == $_SESSION['userid']){ 
						
						} 
						else{ 
							echo '<div class="follow" ><form action="includes/addfriend.php" style="width: 75px; float: left;" METHOD="POST"><input type="hidden" name="user" value="' . $profileuser . '"><input type="submit" class="btn btn-success btn" value="Volgen"></form>
							<form action="newmail.php" style="width: 44px; float: left;"method="post">
							<input type = "hidden" name="touser" value="' . $profileuser . '">
							<button class="btn btn-primary" value="mailen" ><i class="fa fa-envelope"></i></button>
							</form>
							<br> <br>
							</div>';
						}
					}
					else{
													echo '<div class="follow" ><form action="includes/unfollow.php" METHOD="POST"><input type="hidden" name="user" value="' . $profileuser . '"><input type="submit" class="btn btn-danger btn" value="Ontvolgen"></div>';
					}
					?>
				</div>
				<div class="well" style="overflow: collapse;">
					<h3>Foto's van <?php echo ucfirst($profileusername);?></h3>
                    <?php 
						$query2 = mysqli_query($con, "SELECT * FROM messages WHERE user = '$profileuser' AND photo <> '0'") or die(mysqli_error($con));
						$numphotos = mysqli_num_rows($query2);
						if(!$numphotos == 0){
							while($row = mysqli_fetch_array($query2)){
								echo ' 
								<div height="91" onclick="newimage(' . $row['photo']. ')" style="width: 48%; float: left;box-sizing: inline-block;">
								<a href="#"  data-target="#showimagemodal" data-toggle="modal" class="thumbnail">
      <img height="81" src="http://socialcollege.tk/social/images/' . $row['photo'] . '" alt="">
    </a>
    </div>
   ';
								
							}
							echo '<div style="clear: both;"></div>';
						}
						else{
								echo 'Geen foto\'s gevonden.';
							}
							include 'modals/show-image.php';
							include 'modals/avatar.php';
						
                    ?>
				
				</div>
			</div>
						</div>

			        <div class="container">

                <div class="col-lg-8">
			<?php
				if(isset($_GET['id'])){
					$user = mysqli_real_escape_string($con, $_GET['id']);
					make_profile($user);
				}
				else{
					$user = $_SESSION['userid'];
					make_profile($user);
				}
				
					
					?>
			               </div>
            </div>
        </div>
    </section>
			<?php
	include 'footer.php';
?>


	
