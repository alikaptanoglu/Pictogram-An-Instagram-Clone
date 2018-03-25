<?php session_start();?>
<html>
    <head>
	
        <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="vendor/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
     
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="styles.css" type="text/css">
    
     <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  
     <div class="container-fluid">
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type-="button"  class="navbar-toggle"data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			<?php if(isset($_SESSION['id'])){ ?>
                 <a id="c1" class="navbar-brand" href="home.php">Pictogram</a>
			<?php } else {
				?>
				<a id="c1" class="navbar-brand" href="index.php">Pictogram</a>
			   <?php } ?>
        </div >
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right ">
		
		<?php
		if(isset($_SESSION['id'])){ ?>
	   <li id="l1"><a href="home.php">Home</a></li>
	   <li id="l1"><a href="profile.php">Profile</a></li>
       <li id="l1"><a href="signout.php">SignOut</a></li>
	   <?php } else{ ?>
        <li id="l1"><a href="signin.php">Login</a></li>
        <li id="l1"><a href="register.php">Register</a></li>
        <li id="l1"><a href="#contact">Contact Us</a></li>
		<?php  }
		?>
		   </ul>
        </div> 
     </div>
</nav>
    
     </div>
  </head>
    </html>