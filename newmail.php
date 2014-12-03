<?php
include 'includes/connect.php';
include 'header.php';

if(isset($_POST['touser'])){

$person=mysqli_real_escape_string($con,$_POST['touser']);
}

 echo '
<div class = "container">
<div class= "row">

<div class="well">
verzenden naar
<form action="sendmail.php" method="post">

' ; 
	$friends=mysqli_query($con,"SELECT follows FROM followers WHERE user='$user' "); 	
	$friendslist=array();
	while($row=mysqli_fetch_array($friends)){
		array_push($friendslist,$row['follows']);
				$x=0;
	}
	
 echo '

		<select class="form-control">
			' ; 
if(isset($_POST['touser'])){
	$person = mysqli_real_escape_string($con, $_POST['touser']);
	echo '<option name="person" value="' . $person .'">' . resolveuser($person) . '</option>'; 		
}
foreach($friendslist as $value){
	echo '<option name="person" value="' . $value .'">' . resolveuser($value) . '</option>'; 		
}

		echo '
		
		
		</select>	
</div>


 <div class="well">
	
                    <h4>Bericht vesturen</h4>
                    
                        <div class="form-group">
                            <textarea name="bericht" colin="3" class="form-control"></textarea>
								<input type="hidden" name="person" value="' . $value . '">
                        </div>
                        <button onclick="sendmessage()" id="sendbutton" class="btn btn-primary">Verzenden</button>
                                            <!-- Button trigger modal -->
                                            


						


						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-youtube"></i> YouTube video invoegen</h4>
							  </div>
							  <div class="modal-body">
								<form action="includes/post.php" method="POST">
									<input class="form-control" id="video" autocomplete="off" onchange="check();" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" placeholder="Youtube URL" type="text" style="width: 100%;" name="video">
									<hr><iframe id="youtubevideo" width="560" height="315" src="//www.youtube.com/embed/" frameborder="0" allowfullscreen=""></iframe>
								<input type="hidden" id="videoid" name="videoid">
							  </form></div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
								<button type="submit" class="btn btn-primary">Invoegen</button>
								
      </div>
    </div>
  </div>
</div>
</form>
                </div>
';

include 'footer.php';
?>
