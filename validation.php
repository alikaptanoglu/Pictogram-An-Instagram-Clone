<?php
session_start();
$user=$_POST['mobile'];
$password=$_POST['password'];

$con=mysqli_connect('localhost','root');
if(!$con){
	echo"cannt connect to Database";
}
mysqli_select_db($con,'labour_db');
$q="SELECT * FROM `users` WHERE mobile='$user' && password='$password'";
$result=mysqli_query($con,$q);
$arr=mysqli_fetch_array($result);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['user']=$user;
	$_SESSION['name']=$arr['name'];
	header('location:home.php');
}
else{
	echo "Login Failed.Try Again..!!";
	
}
?>