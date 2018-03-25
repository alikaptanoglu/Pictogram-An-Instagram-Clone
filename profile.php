<?php
include('header.php');
include('config.php');
if(!isset($_SESSION['id'])){
    header('location:signin.php');
}
$id=$_SESSION['id'];
$query="SELECT * from `users` where id='$id'";
$result=mysqli_query($con,$query);
if($result)
{
    $arr=mysqli_fetch_array($result);
    $bio=$arr['bio'];
}

?>

<html><br><br><br>
    <head>
    <style>
        h2{
            color:black;
        }
        body{
            background: url('images/pattern.jpg');
        }
        #msg{
            
            font-family: cursive;
            color: red;
            text-align: center;
            padding-left: 30px;
        }
        .thumbnail{
            width:200px;
            height: 200px;
           
        
        }
        .thumbnail img{
            width:100%;
            height:100%;
            display:grid;
        }
        </style>
    </head>
    
 <div class="container">
     <div class="jumbotron">
    <div class="fb-profile">
        <div class="fb-profile-text">
        <?php 
            $a="SELECT * FROM `displayimages` where id='$id'";
            $results=mysqli_query($con,$a);
            $dp=mysqli_fetch_array($results);
            echo'<img align="left" class="fb-image-profile thumbnail" src="'.$dp['path'].'" alt="Profile image "/>'; ?>
            
        <h2><?php echo $_SESSION['fname'].' '.$_SESSION['lname'] ?></h2>
            <?php echo '<p>'.$bio.'</p>';?>
           
        
            <button data-toggle="modal" data-target="#change_dp"class="btn btn-primary btn-md"role="button">Change Profile Picture</button>
            
        </div>
    </div>
</div>
     <div class="modal fade" id="change_dp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Profile Picture</h4>
            </div>
            
            <div class="modal-body">
			
                <form role="form"method="POST" action="update_verify.php"enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select Image:</label>
                        <input type="file" name="dp"class="form-control">
                        <textarea class="form-control"rows="4" cols="25" name="caption"></textarea>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input value="Update"type="submit" name="change_dp"class="btn btn-primary submitBtn"/>
            </div> 
            </form>
            </div>
        </div>
    </div>
</div>       
               
     <?php if(isset($_SESSION['msg']))echo '<span id="msg"><h3>'.$_SESSION['msg'].'</h3></span>'; ?>
     <div class="jumbotron">
         <h3 align="center"><b>Photos of You</b></h3><br>
     <div class="row">

         <?php  

$q="SELECT * from `images` where id='$id'";
$res=mysqli_query($con,$q);


         while($r=mysqli_fetch_array($res))
         {
    echo '<div class="col-md-3">
         <div class="thumbnail">
             <img class="img-responsive img-thumbnail" src="'.$r['path'].'">             
         </div>
     </div>';
}
         if(mysqli_num_rows($res)==0)
             echo '<h3>Sorry, You have not uploaded any pictures yet..!</h3>';
?>
         
         
         
     </div>
     </div>
    </div>
       
</html>
<?php include('footer.php');
unset($_SESSION['msg']);?>