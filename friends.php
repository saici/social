<?php
include 'includes/connect.php';
$username1 = $_SESSION['userid'];
$user =mysqli_query($con, "SELECT * FROM followers WHERE user='$username1'") or die(mysqli_error($con)) ;


while($row = mysqli_fetch_array($user)){
		echo $follower1=$row['follows'] . "<br>";
}


$follower=mysqli_query($con, "SELECT * FROM users WHERE ID='$follower1'" ) or die(mysqli_error($con));
echo "<br>" . mysqli_num_rows($follower);

echo "string werkt" ;

while($row=mysqli_fetch_array($follower)){
	echo $row['username'];
	}
?>
