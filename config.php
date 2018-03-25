<?php 
$con=mysqli_connect('localhost','root');
if(!$con){
	echo"cannt connect to Database";
}
mysqli_select_db($con,'pictogram');
    
     ?>