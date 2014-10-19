<?php 
	include 'header.php';
	if(isset($_GET['logout'])){
		SESSION_DESTROY();
		header("location: index.php");
	}
?>
	<form action="includes/login.php" method="post">
		Gebruikersnaam <input type="text" name="username"><br>
		Wachtwoord: <input type="password" name="password"><br>
		
		<input type="submit" value="Login">
	</form>



<?php include 'footer.php';?>
