<?php 
include('header.php');
require('config.php');

if(!isset($_SESSION['id'])){
    header('location:signin.php');
}
$id=$_SESSION['id'];
$email=$_SESSION['email'];
$q="SELECT * from `users` where id='$id' AND email='$email' ";
$res=mysqli_query($con,$q);
$arr=mysqli_fetch_array($res);


?>

<html>
<head>
  <title>Update your Details</title> 
    <style>
        #info{
            background-color:cornsilk;
        }
        body{
            background-color: #f1684cfa;
        }
		#contact{
            background-color:aliceblue;
        }
    </style>
</head>
    
    <body>
<div class="container">
<div class="jumbotron">
   <br> <h2>Please Update your details...</h2>
    <br>
    <br>
	<?php if(isset($msg) & !empty($msg)){
		echo $msg;
	} ?>
    <label id="log_field"><b>Bio:</b></label> <?php if($arr['bio']==NULL){echo '<p id="info"><b>Not Updated Yet !</b></p>'.'  '.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#b_modalForm">Update Bio</button>';}
	else{echo '<p id="info">'.$arr['bio'].'</p>'.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#b_modalForm">Update Bio</button>';}?><br><br>
	
    <label id="log_field">Email Activated:</label><?php echo '<p id="info">'.$email.'</p>';if($arr['email activated']=='no'){echo '<p style="color:red;"><b>Not Activated Yet !</b></p><form action="update_verify.php" method="post"><input value="Activate Now"type="submit" name="e_activate"class="btn btn-primary submitBtn"/></form>';}
	else{echo '<p style="color:green;"id="info">Email Activated!</p>' ;}?><br>
	
   <br> <label id="log_field">Facebook:</label><?php if($arr['facebook']==NULL){echo 'Not Updated Yet !'.'  '.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#f_modalForm">Update</button>';}
   else{echo '<p id="info">'.$arr['facebook'].'</p>'.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#f_modalForm">Update</button>';}?><br><br>
   
    <label id="log_field">Instagram:</label><?php if($arr['instagram']==NULL){echo '<p id="info"><b>Not Updated Yet !</b></p>'.'  '.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#i_modalForm">Update</button>';}
	else{echo '<p id="info">'.$arr['instagram'].'</p>'.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#i_modalForm">Update</button>';}?><br><br>
	
    <label id="log_field">Twitter:</label><?php if($arr['twitter']==NULL){echo '<p id="info"><b>Not Updated Yet !</b></p>'.'  '.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#t_modalForm">Update</button>';}
	else{echo '<p id="info">'.$arr['twitter'].'</p>'.'<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#t_modalForm">Update</button>';}?><br><br>
    
</div>
</div>
        <!-- Modal Bio Update -->
 <div class="modal fade" id="b_modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Bio</h4>
            </div>
            
            <div class="modal-body">
			
                <form role="form"method="POST" action="update_verify.php">
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea class="form-control" name="bio"placeholder="Enter your Bio"></textarea>
                    </div>
               
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input value="Update Bio"type="submit" name="b_submit"class="btn btn-primary submitBtn"/>
            </div> 
            </form>
            </div>
        </div>
    </div>
</div>       
         <!-- Modal Facebook Update -->
   <div class="modal fade" id="f_modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Facebook Link</h4>
            </div>
            
            <div class="modal-body">
                <form role="form"method="POST" action="update_verify.php">
                    <div class="form-group">
                        <input type="text"class="form-control" name="facebook"class="btn btn-primary"placeholder="www.facebook.com/username/"/>
                    </div>
               
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input value="Update Facebook Link"type="submit" name="f_submit"class="btn btn-primary submitBtn"/>
            </div> 
            </form>
            </div>
        </div>
    </div>
</div>  
        <!-- Modal Instagram Update -->
<div class="modal fade" id="i_modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Instagram Link</h4>
            </div>
            
            <div class="modal-body">
                <form role="form"method="POST" action="update_verify.php">
                    <div class="form-group">
                        <input type="text"class="form-control" name="instagram"class="btn btn-primary"placeholder="@username"/>
                    </div>
               
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input value="Update Instagram Link"type="submit" name="i_submit"class="btn btn-primary submitBtn"/>
            </div> 
            </form>
            </div>
        </div>
    </div>
</div>  
         <!-- Modal Twitter Update -->
 <div class="modal fade" id="t_modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Update Twitter Link</h4>
            </div>
            
            <div class="modal-body">
                <form role="form"method="POST" action="update_verify.php">
                    <div class="form-group">
                        <input type="text"class="form-control" name="twitter"class="btn btn-primary"placeholder="@username"/>
                    </div>
               
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input value="Update Twitter Link"type="submit" name="t_submit"class="btn btn-primary submitBtn"/>
            </div> 
            </form>
            </div>
        </div>
    </div>
</div>           

</body>
<?php include('footer.php');?>
</html>