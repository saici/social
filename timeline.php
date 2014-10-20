<div class="well">
                    <h4>Status bijwerken</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"><?php if(isset($_GET['re'])){echo mysqli_real_escape_string($con,$_GET['re']);}?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Verzenden</button>
                    </form>
                </div>
<?php


	if(isset($_SESSION['user'])){
			
			$user = $_SESSION['userid'];
			$query = mysqli_query($con, "SELECT * FROM followers WHERE user = '$user'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				array_push($friends, $row['follows']);
			}
			
			foreach($friends as $value){
				$friendlist = $friendlist . " OR user = '" . $value . "'";
			}
		
			
			$timeline = mysqli_query($con, "SELECT * FROM messages WHERE user = '$user' $friendlist ORDER BY messagedate DESC") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($timeline)){
				
				$getuser = $row['user'];
				
				$getuserquery = mysqli_query($con, "SELECT username FROM users WHERE ID = '$getuser'") or die(mysqli_error($con));
				
				
				while($user = mysqli_fetch_array($getuserquery)){
					$userpost = $user['username'];
				}
				
				$getavatar = mysqli_query($con, "SELECT * FROM profile WHERE user = '$getuser'");
				while($info = mysqli_fetch_array($getavatar)){
					$avatar = $info['avatar'];
				}
				
				unset($getuser);
				echo '
				<div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" width="64" src="' . $avatar . '" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">' . ucfirst($userpost) . '
                            <small>' . $row['messagedate'] . '</small>
                        </h4>
                       ' . $row['message'] .'<br /><a href="index.php?re=' . $row['message'] .'">Repost</a>
                    </div>
                </div>
               ';
			}
	}
	
	echo '</div>';
	include 'sidebar.php';
?>
