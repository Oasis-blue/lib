<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("checkses.php");
include("connection.php");








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<style>

.erer .ht{
 display:flex;
 justify-content:space-around;
}


    </style>
<?php
include("resolu.php");


?>


<body>
 
<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>




<?php
$checknot=mysqli_query($connection, "select * from lib.notreqs where userid='$user'");
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
<?php echo $ere['title'] ?> now has (<?php echo $ere['copies'] ?>) copies Available 

</div>
<div><?php  echo '<a href="req.php?rssn='."$ccc".'">Request</a>'; ?></div>

<div><?php $dddi=$cc["notid"];  echo '<a href="marknotu.php?id='."$dddi".'">Mark as read</a>'; ?></div></div>
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
</body>
</html>