<?php include('header.php');?>
<html>
<head>
    <?php 
	require('config.php');
		
		if(isset($_SESSION['id'])){
			header('location:home.php');
		}
     if(isset($_POST['submit'])){
	 $email=$_POST['email'];
	 $pass=$_POST['pass'];
	 if(empty($email) OR empty($pass)){
		 $msg='Email or Password cannot be Null';
	 }
	 else{
		 $cpass=md5($pass);
		 $q="SELECT * from `users` where email='$email' AND password='$cpass'";
		 $res=mysqli_query($con,$q);
		 $arr=mysqli_fetch_array($res);
		 if(mysqli_num_rows($res)==1){
			 $msg='Login Successful';
			 $_SESSION['id']=$arr['id'];
			 $_SESSION['fname']=$arr['fname'];
             $_SESSION['lname']=$arr['lname'];
			 $_SESSION['email']=$arr['email'];
			 header('location:update.php');
		 }
		 else{
			 $msg='Login Failed';
		 }
	 }
	 }

	?>
<title>Log In</title>
    
    <style>
       body{
            background-color: #f1684cfa;
           background-attachment: fixed;
        }
        #contact{
            background-color:aliceblue;
        }
        #icon_user{
            position: relative;
           left:140px;
        }
        h2{
            color:black;
            font-family: cursive;
        }
    </style>
</head>

    <body>
<div class="container">
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4  login_div">
        <h2>Login Here:</h2>
<form action="" method="POST" >
<i id="icon_user" class="fa fa-user fa-5x"></i> <br><br>  
  <?php
if(isset($msg) & !empty($msg)){
	echo '<p id="w1"><b>'.$msg.'</b></p>';
}
?>
<label id="log_field">Mobile/E-mail:</label><input type="text" class="form-control" name="email" required pattern="/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/"/><br>
<label id="log_field">Password:</label><input type="password" class="form-control" name="pass"required/><br>
<input type="Submit" value="Submit" name="submit" class="btn btn-success btn-block"/><br>
</form>
</div>
    <div class="col-lg-4"></div>
</div>
</div> 

    
    </body>
	<?php include('footer.php') ?>
</html>