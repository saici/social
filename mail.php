 <?php
	include 'includes/connect.php';
	
	include 'header.php';
	?>

<div class="container">

        <div class="row">
	
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
					
						<div class="page-header">
									<h1>Mail</h1>
								</div>			
               
<?php
		unset($friendslist);
		
	$mailfriends=array();
		if(isset($_SESSION['user'])){
			
			$user = $_SESSION['userid'];
			$query = mysqli_query($con, "SELECT DISTINCT user FROM mail WHERE touser = '$user'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				array_push($mailfriends, $row['user']);
			}
			
			//eigen inject
			foreach ($mailfriends as $value) {
				if(!isset($friendslist)){
					$friendslist = $friendslist . "user = '" . $value . "'";
				}
				else{
				$friendslist = $friendslist . " OR user = '" . $value . "'";
				}
			}
		//	print_r($friendslist);
			
			
			$mailbox=mysqli_query($con,"SELECT DISTINCT user FROM mail WHERE $friendslist ") or die(mysqli_error($con	));

				
				while($row=mysqli_fetch_array($mailbox)){
				
				
				
				//$gebruiker=mysqli_query($con,"SELECT username FROM users WHERE ID='$value' ");
				$gebruiker=$row['user'];
				
			//get avatar	
			$getuser=$gebruiker;
			$getavatar = mysqli_query($con, "SELECT * FROM profile WHERE user = '$getuser'");
				while($info = mysqli_fetch_array($getavatar)){

				if($info['avatar']=="NONESET"){  
						$avatar = "http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png";
					}
					else{
						$avatar = $info['avatar'];
					} 
				}
				
				
				$lastmsg = mysqli_query($con, "SELECT * FROM mail	WHERE user='$gebruiker' and datesend < NOW() ORDER BY datesend DESC LIMIT 1");
					
					while($row1=mysqli_fetch_array($lastmsg)){
				
				echo '			<div class="well">	
									<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $gebruiker .'">
											<center><img src="' . $avatar .'" width="32" alt="..."> <br /></center><center>' . resolveuser($row['user']) . '
											</center>
											
										</a>
									
										' . $row1['message'] . '
									
								</div>
								<form action="mailperson.php" method ="get">
								<button type="submit" name="person" value="' . $row["user"]  .  '" style="margin-top: 20px;" class="btn btn-info btn-sm" ><i class="glyphicon glyphicon-comment"></i></button>
								 </form>
								
					</div>';	
				}
				
			}
		
			

}
	unset($userid);
?>
				
		</div><?php include 'sidebar.php';?>	
	</div>
	</div>
</div>
									
<?php
 include 'footer.php';
?>