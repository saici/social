<?php 

	function getfriends($friends){
		include 'includes/connect.php';
		if(isset($_SESSION['user']){
			$user = $_SESSION['user'];
		}
		else{
			die('Fout! Log opnieuw in of herstart je browser');
		}
		$query = mysqli_query($con, "SELECT * FROM followers WHERE user = '$user'");
		while($row = mysqli_fetch_array($query)){
			array_push($friends, $row['follows']);
		}
		unset($user);
	}
	function createtimeline($friends){
		include 'includes/connect.php';
		
		$friendsdo = "";
		foreach($friends as $value){
			$friendsdo = $friendsdo . "OR user = " . $value;
		} 
		$query = mysqli_query($con, "SELECT * FROM messages WHERE ID = 0 $friendsdo SORT BY messagedate DESC";
	}
	
?>
