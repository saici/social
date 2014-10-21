<div class="well">
                    <h4>Status bijwerken</h4>
                    <form ACTION="includes/post.php" METHOD="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="post" id="post" rows="3"><?php if(isset($_GET['re'])){echo mysqli_real_escape_string($con,$_GET['re']);}?></textarea>
                            <input type="hidden" name="user" value="<?php if(isset($_GET['user'])){echo $_GET['user'];}else{echo 'NONE';}?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Verzenden">
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
			$timelineexist = mysqli_num_rows($timeline);
			
				if($timelineexist== 0){
														echo '
					<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Geen berichten</strong> Er zijn geen berichten beschikbaar.
</div>
					';


				}
			
			
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
				
				$message = $row['message'];
				$message = str_replace('"', '*', $message);
				
			
		echo ' 
				<div class="media">
				<div class="well">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" width="64" src="' . $avatar . '" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">' . ucfirst($userpost) . '
                            <small>' . $row['messagedate'] . '</small>
                        </h4><br />
                       
                    </div>
                    ' . $row['message'] .'<br /><a style="margin-top: 20px; " class="btn btn-info btn-sm" href="index.php?re=' . $message .'&user=' . $getuser . '">Repost</a> <a style="margin-top: 20px;" class="btn btn-success btn-sm" href="index.php?re=' . $message .'&user=' . $getuser . '"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                </div>
                </div>
               ';		
							
				
				
				
               unset($getuser);
			}
	}
	
	echo '</div>';
	include 'sidebar.php';
?>
