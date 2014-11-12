

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
					$likes = "";
				}
				if($dislikes == 0){
					$dislikes = "";
				}
				
				$messageid = $row['ID'];
			
		echo ' 
				<div class="media">
				<div class="well">
                    <a class="pull-left" href="profile.php?id='. $getuser . '">
                        <img class="media-object" height="64" width="64" src="' . $avatar . '" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">' . ucfirst($userpost) . '
                            <small>' . $row['messagedate'] . '</small>
                        </h4><br />
                       
                    </div>
                    ' . $row['message'] .'<br /><a style="margin-top: 20px; " class="btn btn-info btn-sm" href="index.php?re=' . $message .'&user=' . $getuser . '">Repost</a> <a style="margin-top: 20px;" class="btn btn-success btn-sm" onclick="like(' . $messageid .')"><span class="glyphicon glyphicon-thumbs-up"></span> ' . $likes .'</a> <a style="margin-top: 20px;" class="btn btn-danger btn-sm" href="index.php?dislike=' . $messageid .'"><span class="glyphicon glyphicon-thumbs-down"></span> ' . $dislikes . ' </a>
                </div>
                </div>
               ';		
							
				include 'modals/show-image.php';
				
				
               unset($getuser);
			}
	}
	
	echo '</div>';
	include 'sidebar.php';
?>
