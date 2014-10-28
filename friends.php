<?php
include 'includes/connect.php';
$username1 = $_SESSION['userid'];
$user =mysqli_query($con, "SELECT * FROM followers WHERE user='$username1'") or die(mysqli_error($con)) ;

$friends = array();
while($row = mysqli_fetch_array($user)){
		$singlefriend = $row['follows'];
		if(!in_array($singlefriend,$friends)){
			array_push($friends, $singlefriend);
		}
	}

echo "uw vrienden zijn: <br>" ;
foreach($friends as $value){
	

$follower=mysqli_query($con, "SELECT * FROM users WHERE ID='$value'" ) or die(mysqli_error($con));
	while($row=mysqli_fetch_array($follower)){
		echo $row['username'] . " <br>" ;
		}
}
?>
