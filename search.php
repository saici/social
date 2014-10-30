<?php 
	include 'header.php';
		
		?>
		<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
		<?php
	if(isset($_POST['q']) AND !$_POST['q'] == ""){
		$q = "%" . mysqli_real_escape_string($con, $_POST['q'])  . '%';
		$query = mysqli_query($con, "SELECT ID, username FROM users WHERE username LIKE('$q')") or die(mysqli_error($con));

		if(mysqli_num_rows($query) == 0){
			echo '
			<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">×</a>
    <strong>Geen resultaten</strong> De zoekterm die u heeft ingevuld heeft geen resulaten opgeleverd. Controleer voor typefouten.
</div>
			';
		}
		while($row = mysqli_fetch_array($query)){
			$id = $row['ID'];
			$profileinfo = mysqli_query($con, "SELECT * FROM profile WHERE user = '$id'") or die(mysqli_error($con));
			while($row2 = mysqli_fetch_array($profileinfo)){
				echo '
				<div class="col-xs-3">
					<a href="profile.php?id=' . $id . '" class="thumbnail">
						<img width="170px" id="photo1" height="170px" src="' . $row2['avatar']. '" alt="100%x180"><br />
						<center>' . ucfirst($row['username']) . '</center>
					</a>
				</div>
				';
			}
			
		}
	}
	?>
	      </div>
                </div>
	<?php
	include 'footer.php';
?>
