
<?php
		include 'header.php';

?>
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

<?php
if(isset($_SESSION['user'])){
		include 'includes/login-instellingen.php';
		
		if($success == 0){
			
			?>
			<script>
				document.location="index.php";
			</script>
			<?php
			die('');
		}
		include 'deleteform.php';
		include 'wwform.php';
		include 'emailform.php';
		include 'friendsform.php';
?>
</div>

<?php
        include 'sidebar.php';
        include 'footer.php';
	}
	else{
		header("location: index.php");
	}

	?>
	</div>
