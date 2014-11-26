 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Social College</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="profile.php">Mijn Profiel</a>
                    </li>
                    <li>
							<a href="forum.php">Forum</a>
						</li>
						<li>
						<a href="mail.php">Mail</a>
						</li>
						<li>
                        <a data-toggle="modal" data-target="#signin-modal" href="#">Instellingen</a>
                    </li>
						
                    
                </ul>
<ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" action="search.php" method="POST" role="search">
        <div class="input-group">
                        <input type="text" id="q" name="q" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        
                    </div>
      </form>
      <li class="dropdown">
			<?php
				$user = $_SESSION['userid'];
				$query = mysqli_query($con, "SELECT * FROM notifications WHERE touser = '$user'");
				
			?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge"><?php echo mysqli_num_rows($query);?></span> <span class="caret"></span></a>
              <ul class="dropdown-menu message-dropdown" role="menu">

				<?php include 'includes/notifications.php';?>
                        
                        
              </ul>
            </li>
       <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucfirst($_SESSION['user']);?></span> <span class="caret"></a>
                       <ul class="dropdown-menu message-dropdown" role="menu">
						<li><a href="login.php?logout">Log uit</a></li>   
						</ul>
                    </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php include 'modals/settings.php';?>

