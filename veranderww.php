<?php
	include 'header.php';
		if(isset($_POST['new'])and isset($_POST['new1']) and isset($_SESSION['user'])){
			$new=$_POST['new'];
			$new1=$_POST['new1'];
			
			if($new==$new1){
				$userid=$_SESSION['userid'];
				mysqli_query($con,"UPDATE users SET password='$new'
				WHERE id= '$userid'");
			}
			if($new!==$new1){
			echo "de wachtwoorden komen niet overeen";
			}
			if($new=="" or $new==""){
				voer de velden in aub
				}
	}



?>