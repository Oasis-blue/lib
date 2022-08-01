<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
if(!isset($_GET['id'])){

   
    header("Location:viewusers.php");


}
include("exfix.php");
include("connection.php");
include("checkses.php");
$user=$_GET['id'];

if(isset($_POST['acti'])){

    $ac=mysqli_query($connection,"update lib.users set status=1 where userid='$user'");
    
    if($ac==1){
    
    $msg="<span style='color:green'>Account Activated</span>";
    
    }else{
    
        $msg="<span style='color:red'>Failed to activate account. Contact Programmer</span>";
    }
    
    
    
    }
$chst=mysqli_query($connection,"select * from lib.users where userid='$user'");
if(mysqli_num_rows($chst)<1){
    header("Location:viewusers.php");  
}
$chsta=mysqli_fetch_assoc($chst);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate user account</title>
</head>
<?php
include("resolu.php");


?>
<style>

    #acto:hover{opacity: 1;}
#acto{
    background-color:forestgreen;
color: white;
opacity: 0.8;
font-size: 2em;
padding: 10px 20px;

border-radius: 10px;
cursor: pointer;
}

#sio{

font-size: 2em;
padding: 10px 20px;

border-radius: 10px;
cursor: not-allowed;
}


</style>
<body>
   
<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>

<br>
<div class="colo">
<br>
<center>
<a href="index.php" style="color: white;">GO TO HOMEPAGE</a>
</center>
<br> </div><br>
<center><a href="viewusers.php">GO BACK</a>
<br>
<?php echo $msg ?? "" ?></center>
<center><h1>Activate User <?php

echo $user;
?>'s Account</h1></center>
<div class="dets">
<center><h2>You are about to activate the account of the above user

</h2></center>


</div>
<form method="POST">
<center>
<?php


if($chsta['status']==0){

?>
<button type="submit" name="acti" value="activate" id="acto">Activate</button>



<?php
}else{

?>


<button disabled id="sio">Activate</button>





<?php

}

?>
</center>
</form>
<div style="min-height:80vh ;"></div>

</body>
</html>