<?php 
include 'includes/connect.php';


	if(isset($_GET['like'])){
		$likeid = mysqli_real_escape_string($con, $_GET['like']);
		$user = $_SESSION['userid'];
		$query = mysqli_query($con, "SELECT * FROM likes WHERE user = '$user' AND message = '$likeid' AND type='1'");
		if(mysqli_num_rows($query) == 0){
			mysqli_query($con, "UPDATE messages SET likes = likes + 1 WHERE ID = '$likeid'") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO likes(user, message, type) VALUES('$user', '$likeid', '1')") or die(mysqli_error($con));
			$getusername = mysqli_query($con, "SELECT username FROM users WHERE ID = '$user'") or die(mysqli_error($con));
			while($row = mysqli_fetch_array($getusername)){
				$usernameresult = ucfirst($row['username']);
			}
			$message = $usernameresult . " heeft je bericht geliked!";
			mysqli_query($con, "INSERT INTO notifications(user, date, notification, img, url, type) VALUES('$user', NOW(), '$message', '1', '', '1')") or die(mysqli_error($con));
			header("Location: index.php");
		}
	}
	if(isset($_GET['dislike'])){
		$likeid = mysqli_real_escape_string($con, $_GET['dislike']);
		$user = $_SESSION['userid'];
		$query = mysqli_query($con, "SELECT * FROM likes WHERE user = '$user' AND message = '$likeid' AND type='2'");
		if(mysqli_num_rows($query) == 0){
			mysqli_query($con, "UPDATE messages SET dislikes = dislikes + 1 WHERE ID = '$likeid'") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO likes(user, message, type) VALUES('$user', '$likeid', '2')") or die(mysqli_error($con));
			header("Location: index.php");
		}
}

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
    <title>Blog Post - Start Bootstrap Template</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/full-width-pics.css" rel="stylesheet">


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
	<?php include 'nav.php'; ?>

<!-- Page Content -->
