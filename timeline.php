

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
								<div class="page-header">
									<h1>Timeline</h1>
								</div>


<!-- Modal -->

<div class="well">
	
                    <h4>Status bijwerken</h4>
                    <form ACTION="includes/post.php" METHOD="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="post" id="post" rows="3"><?php if(isset($_GET['re'])){echo mysqli_real_escape_string($con,$_GET['re']);}?></textarea>
                            <input type="hidden" name="user" value="<?php if(isset($_GET['user'])){echo $_GET['user'];}else{echo 'NONE';}?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Verzenden">
                                            <!-- Button trigger modal -->
                                            


<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    + 
  </button>
  <ul class="dropdown-menu" role="menu">
	<li>
	<a  href="#" data-target="#myModal" data-toggle="modal">
		<i class="fa fa-youtube"></i> YouTube
	</a> 
	</li>
    <li><a href="#"  data-target="#imagemodal" data-toggle="modal"><i class="fa fa-picture-o"></i> Foto</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
                    </form>

<?php
	include 'modals/youtube.php';
	include 'modals/image.php';
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
				$userid = $_SESSION['userid'];
				$getuserquery = mysqli_query($con, "SELECT username FROM users WHERE ID = '$getuser'") or die(mysqli_error($con));
				
				
				while($user = mysqli_fetch_array($getuserquery)){
					$userpost = $user['username'];
				}
				
				$getavatar = mysqli_query($con, "SELECT * FROM profile WHERE user = '$getuser'");
				while($info = mysqli_fetch_array($getavatar)){

				if($info['avatar']=="NONESET"){  
					$avatar = "http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png";
				}
				else{
					$avatar = $info['avatar'];
				} 
				}
				
				$message = $row['message'];
				$message = str_replace('"', '*', $message);
				$likes = $row['likes'];
				$dislikes = $row['dislikes'];
				
				if($likes == 0){
					$likes = "0";
				}
				if($dislikes == 0){
					$dislikes = "0";
				}
				
				$messageid = $row['ID'];
				
				$checklikestate = mysqli_query($con, "SELECT * FROM likes WHERE user = '$userid' AND message = '$messageid'");
				if(mysqli_num_rows($checklikestate) == 0){
					$likebutton = '<a style="margin-top: 20px;" id="like' . $messageid. '"class="btn btn-success btn-sm" onclick="like(' . $messageid .')"><span class="glyphicon glyphicon-thumbs-up"></span> ' . $likes .'</a>';
				}
				else{
					$likebutton = '<a style="margin-top: 20px;" id="like' . $messageid. '"class="btn btn-success btn-sm active" onclick="like(' . $messageid .')"><span class="glyphicon glyphicon-thumbs-up"></span> ' . $likes .'</a>';
				}
				
			
		echo ' 
				
				<div class="well">
									<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $row['user'] .'">
											<img src="http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png" width="64" alt="..."> <br /><center>' . ucfirst($userpost) . '</center>
										</a>
									<div style="padding-left: 10px;" class="media-body">
										' . ucfirst($row['message']) . '
										</div>
									</div>
                    <a style="margin-top: 20px; " class="btn btn-info btn-sm" href="index.php?re=' . $message .'&user=' . $getuser . '">Repost</a> ' . $likebutton .'  
                </div>
                
               ';		
							
				include 'modals/show-image.php';
				
				
               unset($getuser);
			}
	}
	
	echo '</div>';
	include 'sidebar.php';
?>
