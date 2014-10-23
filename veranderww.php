<?php
	include 'header.php';
?>
<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
<?php
		if(isset($_POST['new'])and isset($_POST['new1']) and isset($_SESSION['user'])){
			$new=mysqli_real_escape_string($con, $_POST['new']);
			$new1=mysqli_real_escape_string($con, $_POST['new1']);
			
            if($new=="" or $new1==""){
				echo "voer de velden in aub";
			}
			if($new==$new1){
				$userid=$_SESSION['userid'];
				mysqli_query($con,"UPDATE users SET password='$new' WHERE ID= '$userid'") or die('Er is iets fout gegaan. Probeer het later opnieuw.');
                SESSION_DESTROY();
                ?>
<script>
window.location.href = "index.php"; 
</script>
 <?php
			}
			else{
			echo '
                <div class="alert alert-danger">
                     <a href="#" class="close" data-dismiss="alert">×</a>
                        <strong>Fout</strong> De twee ingevulde wachtwoorden komen niet overeen.
                </div>
            ';


			}

	}



?>
</div>
</div>
</div>

<?php include 'footer.php';?>   