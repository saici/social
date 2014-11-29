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
                        <a href="index.php" title="Home"><i class="fa fa-home"></i>
</a>
                    </li>
                    
                    <li>
							<a href="forum.php" title="Forum"><i class="fa fa-comments"></i>
</a>
						</li>
						<li>
						<a href="mail.php" title="Mail"><i class="fa fa-envelope"></i>
</a>
						</li>
						<li>
                        <a data-toggle="modal" data-target="#signin-modal" title="Instellingen" href="#"><i class="fa fa-cog"></i>
</a>
                    </li>
						
                    
                </ul>
<ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" action="search.php" method="POST" role="search">
        <div class="input-group">
                        <input type="text" id="q" name="q" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" type="button">
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <?php echo mysqli_num_rows($query);?></span> <span class="caret"></a>
              <ul class="dropdown-menu message-dropdown" role="menu">

				<?php include 'includes/notifications.php';?>
                        
                        
              </ul>
            </li>
       <li class="dropdown">
						<a href="#" class="dropdown-toggle" id="usermenu" data-toggle="dropdown"><?php echo ucfirst($_SESSION['user']);?></span> <span class="caret"></a>
						<ul class="dropdown-menu message-dropdown" role="menu">
							<li><a href="profile.php"> <i class="fa fa-user"></i> Mijn Profiel</a></li>
							<li><a href="#" title="Instellingen" data-toggle="modal" data-target="#signin-modal"><i class="fa fa-cog"></i> Instellingen</a></li>
							<li><a href="login.php?logout" > <i class="fa fa-power-off"></i> Log uit</a></li>   
						</ul>
                    </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php include 'modals/settings.php';?>

