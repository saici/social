<?php


	function getfriends($user){
			include 'includes/connect.php';
			
			$friends = array();
			$friendlist = "";
			$query = mysqli_query($con, "SELECT * FROM followers WHERE user = '$user'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				array_push($friends, $row['follows']);
			}
			
			foreach($friends as $value){
				$friendlist = $friendlist . " OR user = '" . $value . "'";
			}
		
			
			return $friendlist;
	}
	
	function postexist($user, $friendlist, $query){
			include 'includes/connect.php';
			
			$timelineexist = mysqli_num_rows($query);
			
				if($timelineexist== 0){
					echo '
					<div id="alert" style="display: block;" class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Geen berichten</strong> Er zijn geen berichten beschikbaar.
					</div>
					<div id="newmessage">

					</div> 
					';
		}
	}
	function timeline($timeline){
		include 'includes/connect.php';
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
				
				$checklikestate = mysqli_query($con, "SELECT * FROM likes WHERE user = '$userid' AND message = '$messageid' ORDER BY ID DESC");
				if(mysqli_num_rows($checklikestate) == 0){
					$likebutton = '<a style="margin-top: 20px;" id="like' . $messageid. '"class="btn btn-success btn-sm" onclick="like(' . $messageid .')"><span class="glyphicon glyphicon-thumbs-up"></span> ' . $likes .'</a>';
				}
				else{
					$likebutton = '<a style="margin-top: 20px;" id="like' . $messageid. '"class="btn btn-success btn-sm active" onclick="like(' . $messageid .')"><span class="glyphicon glyphicon-thumbs-up"></span> ' . $likes .'</a>';
				}
				$comments = '';
				$id = 'c' . $row['ID'];

				
				$newquery = mysqli_query($con, "SELECT * FROM topics WHERE category='comment' AND topicID = '$id' ORDER BY id ASC");
				
				while($rowco = mysqli_fetch_array($newquery)){
					$commentuser = ucfirst(resolveuser($rowco['user']));
					$commentuserid = $rowco['user'];
					$getavatar = mysqli_query($con, "SELECT * FROM profile WHERE user = '$commentuserid'");
						while($info = mysqli_fetch_array($getavatar)){

						if($info['avatar']=="NONESET"){  
							$coavatar = "http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png";
						}
						else{
							$coavatar = $info['avatar'];
						} 
					}
					
					$comments = $comments . '
					<blockquote style="padding: 0 0 0 0; font-size: 12px;">
					<div class="media-body-wrap panel">
					
					<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $rowco['user'] .'">
											<center><img src="' . $coavatar .'" width="32" alt="..."> <br /></center><center>'. ucfirst($commentuser) . '</center>
										</a>
									<div style="padding-left: 10px; padding-top: 10px;" class="media-body">
										' . ucfirst($rowco['message']) . '
										</div>
										
									</div>
					
					</div>
					</blockquote>';
				}
								
				echo ' 
				
<div id="newmessage">

</div>                    

				<div class="well" id="well' . $row['ID'] . '">
									<div class="media">
										<a class="media-left" style="float: left;" href="profile.php?id=' . $row['user'] .'">
											<img src="' . $avatar .'" width="64" alt="..."> <br /><center>' . ucfirst($userpost) . '</center>
										</a>
									<div style="padding-left: 10px;" class="media-body">
										' . ucfirst($row['message']) . '
										</div>
										
									</div>
									
                    <a style="margin-top: 20px; " class="btn btn-info btn-sm" onclick="repost(' . $row['ID'] . ')"><i class="fa fa-quote-left"></i></a> <a style="margin-top: 20px;" data-target="#comment" onclick="quote(' . $getuser . ','. $row['ID'] .')" data-toggle="modal" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-comment"></i></a> ' . $likebutton .'  
                    <div style="margin-top: 10px;">' . $comments . '</div>
                </div>
                
               ';		
							
				include 'modals/show-image.php';
				include 'modals/comment.php';
				
               unset($getuser);
			}
	}
	
	function make_timeline(){
			include 'includes/connect.php';
			$user = $_SESSION['userid'];
			$friendlist = getfriends($_SESSION['userid']);

			$timeline = mysqli_query($con, "SELECT * FROM messages WHERE user = '$user' $friendlist ORDER BY messagedate DESC") or die(mysqli_error($con));
			
			postexist($_SESSION['userid'], $friendlist, $timeline);
				
			
			timeline($timeline);
	}
		function make_profile($user){
			include 'includes/connect.php';
			
			$friendlist = getfriends($_SESSION['userid']);

			$timeline = mysqli_query($con, "SELECT * FROM messages WHERE user = '$user'  ORDER BY messagedate DESC") or die(mysqli_error($con));
			
			postexist($_SESSION['userid'], $friendlist, $timeline);
				
			
			timeline($timeline);
	}

