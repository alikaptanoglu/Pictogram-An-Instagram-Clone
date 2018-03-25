<?php include('header.php'); ?>
<html>
<head>
    <?php
	
require('config.php');
if(isset($_SESSION['id'])){
	header('location:update.php');
}
     ?>
<?php
if(isset($_POST['submit'])){

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$cq="SELECT 1 from `users` where email='$email'";
	$sres=mysqli_query($con,$cq);
	if(mysqli_num_rows($sres)>0){
	
	$msg='Email already registered with us..Try another one!';
	}
elseif($pass!=$cpass){
	$msg='Passwords donot Match..Please try again!';
	
}
else{
	
	$pass_hash=md5($pass);
$q="INSERT INTO `users` (`fname`,`lname`,`email`,`password`) VALUES ('$fname','$lname','$email','$pass_hash')";
$res=mysqli_query($con,$q);
if($res){
$msg='You are Registered Successfully!';
$q="SELECT * from `users` where email='$email'";
$res=mysqli_query($con,$q);    

if(mysqli_num_rows($res)== 1)  {
	$arr=mysqli_fetch_array($res); 
	$_SESSION['id']=$arr['id'];
    $id=$arr['id'];
	$_SESSION['fname']=$arr['fname'];
    $_SESSION['lname']=$arr['lname'];
    $_SESSION['email']=$arr['email'];
    $q2="INSERT into `displayimages` (id,path,caption,timestamp) values ('$id','NULL','NULL',CURRENT_TIMESTAMP)";
    mysqli_query($con,$q2);
	header('location:update.php');
    

}
	}

}

}
?>



<title>Register</title>
    <style>
       body{
            background-color: #f1684cfa;
           background-attachment: fixed;
        }
        #contact{
            background-color:aliceblue;
		}
		#w1{
			color:darkblue;
			background-color:white;
			border:2px solid black;
			font-size:120%;
            font-family: monospace;
           
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
        <h2>Please fill in the Details Below:</h2>
		<?php
if(isset($msg) & !empty($msg)){
	echo '<p id="w1"><b>'.$msg.'</b></p>';
}
?>
<form action="" method="POST" >

  
    <label id="log_field">First Name:</label><input type="text" class="form-control" name="fname" required/><br>
    <label id="log_field">Last Name:</label><input type="text" class="form-control" name="lname"required/><br>
    <label id="log_field">E-mail:</label><input type="email" class="form-control" name="email"required pattern="/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/"/><br>
    <label id="log_field">Password:</label><input type="password" class="form-control" name="pass"required /><br>
    <label id="log_field">Confirm Password:</label><input type="password" class="form-control" name="cpass"required /><br>

<input type="submit" value="Submit" name="submit"class="btn btn-success btn-block"><br>
</form>
        
</div>
    <div class="col-lg-4"></div>
</div>
        </div> 

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading"><b>Let's Get In Touch!</b></h2>
                    <hr class="primary ">
                    <p id="p_font">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>+91-7376373540</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">sakshamsrivastava74@gmail.com</a></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-github fa-3x sr-contact"></i>
                    <p><a href="https://www.github.com/saksham7/">https://www.github.com/saksham7/</a></p>
                </div>
           </div>
        </div>
    </section>
    
 </body>
</html>