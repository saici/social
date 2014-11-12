<?php
	include '../header.php';
?>
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
<?php
	include '../includes/salt.php';
		if(isset($_POST['new']) and isset($_SESSION['user'])){
            
			$userid = $_SESSION['userid'];
			$new=mysqli_real_escape_string($con, $_POST['new']);
			
			
			$checkvalue = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
			$numvalue = mysqli_num_rows($checkvalue);
	
			if($numvalue == 1){
					while($row = mysqli_fetch_array($checkvalue)){
						$email = $row['email'];
						$date = date("YmdHis" ,strtotime($row['registrationdate']));
						
						$password = salt($username, $password, $email, $date);
						
							
									if($new==""){
									echo '
										<div class="alert alert-danger">
											 <a href="#" class="close" data-dismiss="alert">×</a>
												<strong>Fout</strong> U heeft geen nieuw email adress ingevoerd
										</div>
									';}

			}
									else{
				$userid=$_SESSION['userid'];
			//	mysqli_query($con,"UPDATE users SET email='$new' WHERE ID= '$userid'") or die('Er is iets fout gegaan. Probeer het later opnieuw.');
			}
			

	}



?>
</div>
</div>
</div>
