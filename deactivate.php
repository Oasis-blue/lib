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

    $ac=mysqli_query($connection,"update lib.users set status=0 where userid='$user'");
    
    if($ac==1){
    
    $msg="<span style='color:green'>Account Deactivated</span>";
    
    }else{
    
        $msg="<span style='color:red'>Failed to deactivate account. Contact Programmer</span>";
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
    <title>Deactivate user account</title>
</head>
<?php
include("resolu.php");


?>
<style>
#acto:hover{
    background-color:    #e74c3c;
}
#acto{
    background-color:#f44336;
color: black;

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
center h1{
 font-family:'Open Sans', sans-serif;}
 
 /* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Underline text tag */
.dets h2 u{
 font-family:'Open Sans', sans-serif;
}

/* Table */


/* Dets */
.dets{
 display:flex;
 align-content:center;
 justify-content:center;
 align-items:center;
 flex-direction:column;
}
.dets tr th{
 text-align:left;
 width: 50%;   padding: 12px 20px 12px 40px;
}
.dets tr td{ width: 50%;   padding: 12px 20px 12px 40px;}
.grt tr {
   background-color:  #bdc3c7;

}
 
 .grt{
    min-width: 60%;

    
 }
 
 
/* Apr */
.apr{

 color:#27ae60;
 background-color:#ecf0f1;
}

/* Deny */
.deny{

 background-color:#ecf0f1;
 color:#e74c3c;
}

/* Deny (hover) */
.deny:hover{
    background-color:#e74c3c;
 color:#ffffff;
}

/* Apr (hover) */
.apr:hover{
    background-color:#27ae60;
 color:white;
}

 .apr, .deny{

border-radius: 10px;
   
 padding-left:18px;
 padding-right:18px;
 padding-top:12px;
 padding-bottom:12px;

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
<a href="index.php" >GO TO HOMEPAGE</a>
</center>
<br> </div><br>
<center><a href="viewusers.php">GO BACK</a>
<br>
<?php echo $msg ?? "" ?></center>
<center><h1>Deactivate User <?php

echo $user;
?>'s Account</h1></center>
<div class="dets">
<center><h2>You are about to deactivate the account of the above user

</h2></center>


</div>
<form method="POST">
<center>
<?php


if($chsta['status']==1){

?>
<button type="submit" name="acti" value="activate" id="acto">Deactivate</button>



<?php
}else{

?>


<button disabled id="sio">Deactivate</button>





<?php

}

?>
</center>
</form>
<div style="min-height:80vh ;"></div>

</body>
</html>