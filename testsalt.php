<?php 
	include 'includes/salt.php';
	$username = 'test';
	$password = 'test';
	$email = 'test';
	$date = date("YMD His");
	salt($username, $password, $email, $date);
?>