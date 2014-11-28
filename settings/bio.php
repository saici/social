<?php if(!isset($con)){die('Error');} ?>
<h2>Biografie</h2>
<form action="includes/setbio.php" method="POST"  enctype="multipart/form-data">		
	<textarea class="form-control" placeholder="Vertel iets over jezelf!"name="bio">
<?php
		$user = $_SESSION['userid'];
		$query = mysqli_query($con, "SELECT bio FROM profile WHERE user ='$user'");
		while($row = mysqli_fetch_array($query)){
			if($row['bio'] == "NONESET"){
				echo "";
			}
			else{
				echo $row['bio'];
			}
		}
?>
</textarea>
    <Br />
    <button type="submit" class="btn btn-primary">Instellen</button>
</form>
