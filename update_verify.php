<?php
session_start();
require('config.php');

$id=$_SESSION['id'];
$email=$_SESSION['email'];
if(isset($_POST['b_submit'])){
	$bio=$_POST['bio'];
	$uq="UPDATE `users` SET `bio` = '$bio' WHERE `users`.`id` = '$id' AND `users`.`email` = '$email'";
	$ures=mysqli_query($con,$uq);
if($ures){
	$msg='ho';
	header('location:update.php');
}
else{
	$msg='<h2>Updation Failed</h2>';
    echo $msg;
}

}

if(isset($_POST['f_submit'])){
	$facebook=$_POST['facebook'];
	$uq="UPDATE `users` SET `facebook` = '$facebook' WHERE `users`.`id` = '$id' AND `users`.`email` = '$email'";
	$ures=mysqli_query($con,$uq);
if($ures){
	header('location:update.php');
}
else{
	$msg='<h2>Updation Failed</h2>';
    echo $msg;
}

}

if(isset($_POST['i_submit'])){
	$instagram=$_POST['instagram'];
	$uq="UPDATE `users` SET `instagram` = '$instagram' WHERE `users`.`id` = '$id' AND `users`.`email` = '$email'";
	$ures=mysqli_query($con,$uq);
if($ures){
	header('location:update.php');
}
else{
	$msg='<h2>Updation Failed</h2>';
    echo $msg;
}

}

if(isset($_POST['t_submit'])){
	$twitter=$_POST['twitter'];
	$uq="UPDATE `users` SET `twitter` = '$twitter' WHERE `users`.`id` = '$id' AND `users`.`email` = '$email'";
	$ures=mysqli_query($con,$uq);
if($ures){
	header('location:update.php');
}
else{
	$msg='<h2>Updation Failed</h2>';
    echo $msg;
}

}
if(isset($_POST['e_activate']))
{
  $a=rand(256,999);
  $b="agje0cene";
  $c=rand(0,535);
  $d="cebi";
  $k=$a.$b.$c.$d;
  $key=md5($k);
  
 $to=$email;
 $subject="Email Verification";
 $headers="From:PixoGrid<noreply@codecreators.tk>";
 $message='<p>Hey,get quick access to  most of the features of PixoGrid by simply verifying your account.<br>Click below link to Activate Now..!</p>
 <br><br><a href="mail_verify.php?key='.$key.'&email='.$email.'">Click Here</a>';
 if(mail($to,$subject,$message,$headers)){
	 $mq="INSERT into `email_activate` (id,key_hash,email) VALUES ('$id','$key','$email')";
	 if(mysqli_query($con,$mq)){
		 echo '<h3>Confirmation Email Sent...Check Inbox</h3><br><p><a href="update.php">Click Here</a> to go back.';
	 }
	 else{
		 header('location:update.php');
	 }
 }
 else{
	echo '<h3>Sorry, Confirmation mail cannot be sent to your mail</h3><br><p><a href="update.php">Click Here</a> to go back.'; 
 }

 
}

//UPDATING DP
if(isset($_POST['change_dp'])){
    $imgname=$_FILES["dp"]["name"] ;
    $target="DisplayImages/";
    $caption=$_POST['caption'];
    $filetarget=$target.$imgname;
    $imageFileType=pathinfo($filetarget,PATHINFO_EXTENSION);
    $tempname=$_FILES["dp"]["tmp_name"];
    // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
    
    
    if(move_uploaded_file($tempname,$filetarget)){
        $id=$_SESSION['id'];
        $caption=$_POST['caption'];
        $q="UPDATE `displayimages` set path='$filetarget' ,caption='$caption',timestamp=CURRENT_TIMESTAMP WHERE id ='$id'";
       
        $res=mysqli_query($con,$q);
        if($res)
        {
            $msg="Photo Uploaded Sucessfully..";
            $_SESSION['msg']=$msg;
            header('location:profile.php');
        }
        else{
            echo 'Error Description:'.mysqli_error($con);
        }
    }
    else{
        $msg="Sorry, There was an error TRY AGAIN..!";
        $_SESSION['msg']=$msg;
        header('location:profile.php');
        }
}

?>