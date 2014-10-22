<?php 
include 'includes/connect.php';


$friends = array();
$friendlist = "";

$checkpage = 'true';


?>
<?php 
	
	if(isset($_GET['logout'])){
		SESSION_DESTROY();
		header("location: index.php");
		
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Social College</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>Social College
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Log in</h1>
                        	<form action="includes/login.php" method="post">
								<?php if(isset($_GET['failed'])){ echo'
									<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Fout</strong> De gegevens die je hebt ingevuld zijn onjuist. Controleer voor spel/type fouten.
</div>
									';
								}0
									?>
																	<?php if(isset($_GET['removed'])){ echo'
									<div class="alert alert-info">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Verwijderd</strong> Je account is succesvol verwijderd.
</div>
									';
								}0
									?>
		<input type="text"class="form-control" placeholder="Gebruikersnaam" name="username"><br>
		<input type="password" class="form-control" style="input-placeholder{color: red;}"placeholder="Wachtwoord" name="password"><br>
		
		<input type="submit" class="btn btn-primary" style="width: 150px;" value="Login"> <a href="#about" style="width: 150px;"class="btn btn-primary page-scroll ">Registreer</a>
                         
                        
	</form>
                    </div>
                   
                </div>
            </div>
            
        </div>
    </header>
    
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
               <h1 class="brand-heading">Registreer</h1>
               <form action="includes/login.php" method="post">
								<?php if(isset($_GET['failed'])){ echo'
									<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Fout</strong> De gegevens die je hebt ingevuld zijn onjuist. Controleer voor spel/type fouten.
</div>
									';
								}0
									?>
		<input type="text"class="form-control" placeholder="Gebruikersnaam" name="username"><br>
		<input type="password" class="form-control" style="input-placeholder{color: red;}"placeholder="Wachtwoord" name="password"><br>
		
		<a href="#about" style="width: 150px;"class="btn btn-primary page-scroll ">Registreer</a>
                         
                        
	</form>
            </div>
        </div>
    </section>
<footer>
        <div class="container text-center">
           
        </div>
    </footer>
<footer>
        <div class="container text-center">
           
        </div>
    </footer>
<footer>
        <div class="container text-center">
           
        </div>
    </footer>
    <footer>
        <div class="container text-center">
           
        </div>
    </footer>
 <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>



</body>
    <script src="js/grayscale.js"></script>

</html>




