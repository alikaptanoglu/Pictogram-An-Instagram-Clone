<?php
require('config.php');
if(isset($_GET['key'])& isset($_GET['email'])){
	$key=$_GET['key'];
	$email=$_GET['email'];
	$q="SELECT * from `email_activate` where key_hash='$key' AND email='$email'";
	$res=mysqli_query($con,$q);
	if(mysqli_num_rows($res)==1)
	{
		$a=mysqli_fetch_array($res);
		$id=$a['id'];
		$q1="UPDATE `users` SET `email activated` = 'Yes' WHERE `users`.`id` = '$id' ";
		if(mysqli_query($con,$q1)){
		$msg="Mail Verified";
		header('location:signin.php');
		}
		
	}
}
else{
	header('location:index.php');
}
?>