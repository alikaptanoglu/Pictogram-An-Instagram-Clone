<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:signin.php');
}

?>
<html>
<head>
<title>home </title>
</head>
<body>
<h3>Hello <?php echo $_SESSION['fname']; ?></h3>
<a href="signout.php">Logout</a>
</body>
</html>
