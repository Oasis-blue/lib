<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
include("connection.php");
include("exfix.php");
include("checkses.php");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<?php
include("resolu.php");


?>
<style>
/* Division */
.erer .ht{
 display:flex;
 justify-content:space-around;
 align-items:center;
 
}





</style>



<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >


<?php
$checknot=mysqli_query($connection, "select * from lib.notreqs");
if(mysqli_num_rows($checknot)>0){
    
?>

<div class="erer"><ul>
<?php


  while($cc=mysqli_fetch_assoc($checknot)){

$ccc=$cc["bookid"];
$cccc=mysqli_query($connection,"select * from lib.content where contentid='$ccc' and copies>0");
$ere=mysqli_fetch_assoc($cccc);
if(mysqli_num_rows($cccc)>0){

?>

<li>
<div class="ht">

<div>
User <?php echo $cc["userid"] ?> requested to be notified when <?php echo $ere['title'] ?> is Available.<br>
There are now (<?php echo $ere['copies'] ?>) copies Available 

</div>
<div>Phone: <?php
$iid=$cc["userid"];

$us=mysqli_query($connection, "select * from lib.users where userid='$iid'");
$isd=mysqli_fetch_assoc($us);
echo $isd['phonenumber']
?>
<br>
Email:<?php

echo $isd['email']
?>

</div>


<div><?php $dddi=$cc["notid"];  echo '<a href="marknot.php?id='."$dddi".'">Mark as notified</a>'; ?></div></div>
</li>

<hr>
<?php


}}

?>
</ul>
</div>

<?php

}else{


    ?>
<div class="cent">

<h1>You have no new notifications.</h1>
</div>
<?php

}

    ?>