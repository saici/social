<?php 

	function getfriends($friends){
		include 'includes/connect.php';
		
		
	}
	function createtimeline($friends){
		include 'includes/connect.php';
		
		$friendsdo = "";
		foreach($friends as $value){
			$friendsdo = $friendsdo . "OR user = " . $value;
		} 
		$query = mysqli_query($con, "SELECT * FROM messages WHERE user = '' $friendsdo SORT BY messagedate DESC";
	}
	
?>
