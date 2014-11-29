<?php
 ini_set('display_errors', '1');

	if(isset($_GET['upload'])){
		header("Location: profile.php");
		
	}
		
include 'includes/connect.php';
include 'functions.php';
$friends = array();
$friendlist = "";

$checkpage = 'true';



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <title>Social College</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/full-width-pics.css" rel="stylesheet">
	<script src="ckeditor/ckeditor.js"></script>
	<script src="js/like.js"></script>
	<script src="js/quote.js"></script>
	<script src="js/comment.js"></script>
	<script src="js/post.js"></script>
	<script src="js/repost.js"></script>
	<script src="js/checkimage.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php include 'timelinejavascript.php';?>
<?php include 'javascriptprofile.php';?>
	
</head>
<body>
	<?php
				$getuser = $_SESSION['userid'];
				$getownavatar = mysqli_query($con, "SELECT * FROM profile WHERE user = '$getuser'");
				while($avatarrow = mysqli_fetch_array($getownavatar)){
				
				if($avatarrow['avatar']=="NONESET"){  
					echo '<div id="ownavatar" style="display: none;">http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png</div>';
				}
				else{
					echo '<div id="ownavatar" style="display: none;">' . $avatarrow['avatar'] . '</div>';
					
				} 
				}
				unset($getuser);
	?>
	<?php include 'nav.php'; ?>

<!-- Page Content -->
