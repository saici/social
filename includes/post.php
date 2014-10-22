<?php
	include 'connect.php';
	
		if(isset($_POST['user'])){
			$atuser = mysqli_real_escape_string($con, $_POST['user']);
		}
		else{
			$atuser = "NONE";
		}

		if($atuser == "NONE"){
			
			if(isset($_POST['post'])){
				$post = mysqli_real_escape_string($con, $_POST['post']);
			}
			elseif(isset($_POST['videoid'])){
				$post = mysqli_real_escape_string($con, $_POST['videoid']);
				$post = '<iframe width="560" height="315" src="//www.youtube.com/embed/' . $post . '" frameborder="0" allowfullscreen></iframe>';
			}
			$user = $_SESSION['userid'];

			mysqli_query($con, "INSERT INTO messages(user,message, messagedate) VALUES ('$user', '$post', NOW())") or die(mysqli_error($con));
		
			unset($user);
			header("Location: ../index.php");
		}
		else{
			
			$query = mysqli_query($con, "SELECT username FROM users WHERE ID = '$atuser'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($query)){
				$post = mysqli_real_escape_string($con, $_POST['post']);
				$post = str_replace('*', '"', $post);
				$user = $_SESSION['userid'];
				$newpost = '<a href="profile.php?id=' . $atuser . '">' . $row['username'] . '</a>: "' . $post . '"';
				mysqli_query($con, "INSERT INTO messages(user,message, messagedate) VALUES ('$user', '$newpost', NOW())") or die(mysqli_error($con));
		
				unset($user);
				header("Location: ../index.php");
			}
		}
		header("Location: ../index.php");
	

?>
