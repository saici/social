<?php 
include 'includes/connect.php';


$friends = array();
$friendlist = "";

$checkpage = 'true';


?>
<html>
<head>
	<title>Social netwerk</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
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

