<?php  ini_set('display_errors', '1'); ?>

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
								<div class="page-header">
									<h1>Timeline</h1>
								</div>


<!-- Modal -->

<div class="well" >
	
                    <h4>Status bijwerken</h4>
                    
                        <div class="form-group">
                            <textarea class="form-control" name="post" id="post" rows="3"><?php if(isset($_GET['re'])){echo mysqli_real_escape_string($con,$_GET['re']);}?></textarea>
                            <input type="hidden" name="user" value="<?php if(isset($_GET['user'])){echo $_GET['user'];}else{echo 'NONE';}?>">
                        </div>
                        <button onclick="sendmessage()" id="sendbutton" class="btn btn-primary">Verzenden</button>
                                            <!-- Button trigger modal -->
                                            


<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    + 
  </button>
  <ul class="dropdown-menu" role="menu">
	<li>
	<a  href="#" data-target="#myModal" data-toggle="modal">
		<i class="fa fa-youtube"></i> YouTube
	</a> 
	</li>
    <li><a href="#"  data-target="#imagemodal" data-toggle="modal"><i class="fa fa-picture-o"></i> Foto</a></li>

  </ul>
</div>

<?php
	include 'modals/youtube.php';
	include 'modals/image.php';
	if(isset($_SESSION['user'])){
			
			make_timeline();
			
	}
	
	echo '</div>';
	include 'sidebar.php';
?>
</div>
