<?php

	include 'includes/connect.php';
	include 'includes/resolver.php';
	
			if(isset($_POST['post'])){
				$post = mysqli_real_escape_string($con, $_POST['post']);
			}
			else{
				die();
			}
			$user = $_SESSION['userid'];
			$post = $_POST['post'];
			$query = mysqli_query($con, "SELECT * FROM messages WHERE ID = '$post'");
			while($row = mysqli_fetch_array($query)){
				$user = resolveuser($row['user']);
				$userid = $row['user'];
				$avatarq = mysqli_query($con, "SELECT * FROM profile WHERE user = '$userid'");
				while($rowa = mysqli_fetch_array($avatarq)){
					$avatar = $rowa['avatar'];
					if($avatar = "NONESET"){
						$avatar = "http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png";
					}
				}
				$message = '
				<div class="well" id="quoted">
									<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $row['user'] . '">
											<img src="' . $avatar . '" alt="..." width="64"> <br><center>' . ucfirst($user). '</center>
										</a>
									<div style="padding-left: 10px;" class="media-body">
										' . $row['message'] .'
										</div>
										
									</div>
									
                  
                   
					
                </div>
				';
			}
			mysqli_query($con, "INSERT INTO messages(user,message, messagedate) VALUES ('$userid', '$message', NOW())") or die(mysqli_error($con));
			echo $message;
			unset($user);

	

?>
