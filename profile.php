<?php 
	include 'header.php';
	
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
			echo '<img src="' . $row['avatar'] . '" width="64px" height="64px">';
			echo $row['bio'];
		}
		echo '<br />';
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
	include 'footer.php';
?>
