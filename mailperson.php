<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
					
				
<?php
include 'includes/connect.php';
include 'header.php';

if(isset($_GET['person'])){
	$person=$_GET['person'];
	$user=$_SESSION['userid'];
	$sended=array();
	
	echo '<div class="page-header">
									<h1>Berichten van
									
									' . resolveuser($person) . '
									<h1></div>'; 

	
	$allmsg=mysqli_query($con,"SELECT message FROM mail WHERE user='$person' and touser='$user' or user='$user' and touser='$person' and datesend < NOW() ORDER BY datesend DESC ");
	$recievedmsg=mysqli_query($con,"SELECT message FROM mail WHERE user='$person' and touser='$user' OR user='$user' and touser ='$person' and datesend < NOW() ORDER BY datesend DESC  " );
	$sendedmsg=mysqli_query($con,"SELECT message FROM mail WHERE touser='$person' and user='$user'  and datesend < NOW() ORDER BY datesend DESC ");
	
	while($row=mysqli_fetch_array($sendedmsg)){
		array_push($sended,$row['message']);
	}
	echo '<div class=well> ';	
	while($row=mysqli_fetch_array($allmsg)){
		
		
		if(in_array($row['message'],$sended)){
			echo '<div class ="chatboxsended">' . $row['message'] .'<br> </div>';
		}
		else{
			echo $row['message'] . "<br>"  ;
		}
		
		
	}
	echo '</div>';
 	
	
}

?>