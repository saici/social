<?php 
include 'includes/connect.php';


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
	<script>

  $(function() {
    var availableTags = [
      <?php 
      $query = mysqli_query($con, "SELECT username FROM users");
      while($row = mysqli_fetch_array($query)){
		echo '"' . $row ['username']. '",';
	  }
	  ?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
  </script>
	</script>
</head>
<body>
	<?php include 'nav.php'; ?>

<!-- Page Content -->
