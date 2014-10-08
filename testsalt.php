<?php 
	include 'includes/salt.php';
	$username = 'jeroen';
	$password = 'hoi';
	$email = 'test@test.nl';
	$date = date("YMDHis", strtotime("2014-10-08 00:00:00"));
	salt($username, $password, $email, $date);
?>
