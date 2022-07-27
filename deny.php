<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
if($_GET["rqid"]==""){
    header("Location:index.php");

}
include("connection.php");
include("checkses.php");
$rqid=$_GET["rqid"];






$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);
if($_POST["appro"]!=""){


$admin=$_SESSION['admin'];
$date= date("d-m-Y") ;
$num=$_POST["num"];
//$tim=date("h:i:sa");



$approve=mysqli_query($connection,"update lib.requests set approval_status='denied' where requestid='$rqid'");
$approve1=mysqli_query($connection,"update lib.requests set date_approved='$date' where requestid='$rqid'");
$approve2=mysqli_query($connection,"update lib.requests set approved_by='$admin' where requestid='$rqid'");



if($approve==1 && $approve1==1 && $approve2==1){
$mesg="<span style='color:green'>Request denied</span>";

}else{$mesg="<span style='color:red'>failed to deny request, please contact programmer</span>";}



}









?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny a request</title>
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
<div style="background-image: url('<?php  echo $stories[$dis]  ?>');
    background-size: cover;">
<div class="alr">
<div style=" border-top-left-radius:49%;
 border-top-right-radius:50%;
 background-color:rgba(255,255,255,0.96) !important;
 border-style:none !important;">   <br>      <br> 
  <center>  <a href="<?php if($_SESSION["jskd"]=="yo"){ echo "viewusers.php";}else{ echo "viewreq.php";}?>">GO BACK</a></center>
<div class="alrt">
    <p><?php echo $mesg ?></p>
<p>You are about to deny user 
    
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


<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="pending"){
    echo "Already approved or denied";
}else{ echo
"Deny request" ;}

?>" required

<?php  
if($gt["approval_status"]!="pending"){ echo "disabled"; }

if($bookav<1){echo "disabled";}   ?>
>
</form>


<br>

</div>

    </div>




</div>
<br>
</div>
<div style="min-height: 80vh;background-image: url('<?php  echo $stories[$dis]  ?>');
    background-size: cover;"></div>




</body>
</html>







