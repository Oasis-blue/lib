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


  




if(isset($_POST["appro"])){
if($_POST["appro"]!=""){
$num=$gt['issued_copies'];
    $l=$gt['bookid'];
    $ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
    $lll=mysqli_fetch_array($ll);
   

$admin=$_SESSION['admin'];


if($gt["approval_status"]=="approved"){
    $updreq1=mysqli_query($connection,"update lib.requests set approval_status='reverted' where requestid='$rqid'");
}

//if($gt["paid"]=="paid"){



//}




if($updreq1==1){
    $upcont=mysqli_query($connection,"update lib.content set copies=copies+$num where contentid=$l");

    $msssg="<span style='color:green'>Revert successful</span>";


}else{

    $mssgerr="<span style='color:red'>failed to revert please contact programmer.</span>";
}



}

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
    <p><?php echo $msssg ?><?php    $mssgerr ?></p>
<p>You are about to Revert user 
    
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
<p><b>Copies Requested:</b> <?php echo $gt['no_of_copies'] ?></p>
<p><b>Approved copies:</b> <?php 
echo  $gt["issued_copies"]; ?>


<p>


<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="approved"){
    echo "Already reverted or issued";
}else{ echo
"Revert" ;}

?>" required

<?php  
if($gt["approval_status"]!="approved"){ echo "disabled"; }

  ?>
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

