<?php include('header.php');
include ('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST['submit_image'])){
  $imgname=$_FILES["myimage"]["name"] ;
    $target="ProfileImages/";
    $filetarget=$target.$imgname;
    $tempname=$_FILES['myimage']['tmp_name'];

    
    if(move_uploaded_file($tempname,$filetarget)){
        
        $id=$_SESSION['id'];
        $caption=$_POST['caption'];
        $q="INSERT INTO `images` (`id`, `path`, `timestamp`, `caption`) VALUES ('$id', '$filetarget', CURRENT_TIMESTAMP, '$caption')";
        
        
        if(mysqli_query($con,$q))
        { //echo ('Error:'.mysqli_error($con));
            $msg="Photo Uploaded Sucessfully..";
            $_SESSION['msg']=$msg;
            header('location:profile.php');
        }
        else{
        $msg="Error Not Uploaded...Try Again";
           $_SESSION['msg']=$msg;
           header('location:profile.php');
            }
    }
    else{
      
        $msg="Error Not Uploaded...Try Again".$filetarget;
            $_SESSION['msg']=$msg;
            header('location:profile.php');
        }
}
?>
<html>
    <head>
    <style>
        body{
            background: url(images/pattern.jpg);
        }
        h2{
            color:black;
            font-family:cursive;
        }
        </style>
    </head>
<body><br><br>
<div class="container">
    <div class="jumbotron">

<form method="POST"  enctype="multipart/form-data">
 <h2><u>Select Image</u></h2><br><input class="form-control"type="file" name="myimage"><br>
<h2><u>Caption</u></h2><br>
    <textarea rows="4" cols="25" name="caption"class="form-control"></textarea><br>
 <input class="btn btn-primary "type="submit" name="submit_image" value="Upload">
</form>
    </div>
    </div>
</body>
</html>