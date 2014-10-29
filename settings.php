
<?php
		include 'header.php';

?>
<script>
$('#personalisatie a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
$('#gegevens a').click(function (e) {
  e.preventDefault()
  $('#gegevens li:eq(1) a').tab('show') 
})
$('#changeww a').click(function (e) {
  e.preventDefault()
  $('#changeww li:eq(2) a').tab('show') 
})
$('#remacc a').click(function (e) {
  e.preventDefault()
  $('#remacc li:eq(2) a').tab('show') 
})
</script>
    <div class="container">

        <div class="row">

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
		?>
		<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#personalisatie" role="tab" data-toggle="tab">Personalisatie</a></li>
  <li><a href="#gegevens" role="tab" data-toggle="tab">Gegevens</a></li>
  <li><a href="#changeww" role="tab" class="alert-danger" data-toggle="tab">Wachtwoord veranderen</a></li>
  <li><a href="#remacc" role="tab" class="alert-danger" data-toggle="tab">Account verwijderen</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="personalisatie"><?php include 'settings/avatarupload.php'; include 'settings/bannerupload.php'; include 'settings/bio.php';?></div>
  <div class="tab-pane" id="gegevens"><?php include 'settings/emailform.php'; ?></div>
  <div class="tab-pane" id="changeww"><?php include 'settings/passwordform.php'; ?></div>
  <div class="tab-pane" id="remacc"><?php include 'settings/deleteform.php'; ?></div>
</div>
            <!-- Blog Post Content Column -->
		<?php
		
		
		
	
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
