<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
if($_GET["rqid"]==""){
    header("Location:index.php");

}
$connection = mysqli_connect("localhost", "root", "mysql", "lib");
include("checkses.php");
$rqid=$_GET["rqid"];






$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve a request</title>
</head>
<?php
include("resolu.php");


?>

<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >

<div class="alr">
  <center>  <a href="viewreq.php">GO BACK</a></center>
<div class="alrt">
<p>You are about to approve user 
    
<?php echo $gt["requesterid"]; ?>'s 
request for 

<u><?php
$l=$gt['bookid'];
$ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
$lll=mysqli_fetch_array($ll);
$book=$lll["title"];
echo $book ?> </u>
<br><br>
Type:<?php 
$lt=$lll["typeid"];
$thh=mysqli_query($connection,"select * from lib.restype where typeid='$lt'");
$thhh=mysqli_fetch_assoc($thh);
echo $thhh["type"] ?>
<br>
<br>Request ID:<?php echo $rqid ?> </p>

</div>
<div class="fm">
<form method="POST">
<p>Available copies: <?php $bookav=$lll["copies"];
echo $bookav ?>

<p>Copies Requested: <?php echo $gt['no_of_copies'] ?></p>
<p>
Approve <input name="num" class="num" type="number" min="1" max="<?php

echo $gt['no_of_copies'] ?>" value="<?php
if($bookav<1){
    echo 0;
}else{ echo 1;}


?>" required> copies</p>

<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="pending"){
    echo "Already dealth";
}else{ echo
"Approve request" ;}

?>" required

<?php  
if($gt["approval_status"]!="pending"){ echo "disabled"; }

if($bookav<1){echo "disabled";}   ?>
>
</form>



</div>






</div>




</body>
</html>