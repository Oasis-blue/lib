<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
if($_SESSION['rett']==""){
    header("Location:index.php");

}
$connection = mysqli_connect("localhost", "root", "mysql", "lib");
include("checkses.php");
$rqid=$_SESSION['rett'];






$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);
if($_POST["appro"]!=""){

    $l=$gt['bookid'];
    $ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
    $lll=mysqli_fetch_array($ll);
   
    $lt=$lll["typeid"];
$ty=mysqli_query($connection,"select * from lib.fines where typeid='$lt'");
$typ=mysqli_fetch_assoc($ty);
$fine=$typ['amount_per_day'];
$admin=$_SESSION['admin'];
$date= date("d-m-Y") ;
$num=$_POST["num"];
//$tim=date("h:i:sa");
$fine=$gt['fine_per_day'];
$days=$_POST["days"];

$getfine=$fine*$days;
$_SESSION["days"]=$days;
$_SESSION["date"]=$date;
$_SESSION["copies_num"]=$num;
$_SESSION["fine"]=$fine;
$_SESSION["finetotal"]=$getfine;
$_SESSION["bookid"]=$l;
header("Location:compret.php");


}









?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make return</title>
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
 <div style="border: 1px solid ; background-color: rgba(255, 255, 255, 0.7);">    <br>      <br> 
  <center>  <a href="ret.php">GO BACK</a></center>
<div class="alrt">
    <p><?php echo $mesg ?></p>
<p>You are about to MAKE A RETURN for user 
    
<?php echo $gt["requesterid"]; ?>
<br>
Title:
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
<p>Status: <?php $bookav=$gt["issued_copies"];
if($gt["no_of_copies_returned"]<$bookav){
$stat="Partial return";
}
if($gt["no_of_copies_returned"]=="" or $gt["no_of_copies_returned"]==0 ){
    $stat="Not returned";
    }
    if($gt["no_of_copies_returned"]==$bookav){
        $stat="Returned";
        }
echo $stat;
?>
</p>

<p>Number of copies returned: <?php  if($gt["no_of_copies_returned"]<1){

    echo 0;
}else{ echo $gt["no_of_copies_returned"];}  ?></p>


<p>Issued copies: <?php echo $gt['issued_copies'] ?></p>

<p>Expected return date: <?php echo $gt['expected_return_date'] ?></p>

<p>
Days passed: <input name="days" class="num" type="number" min="0" required placeholder="enter 0 if none"></p>


<p>
Return <input name="num" class="num" type="number" min="1" max="<?php

echo $gt['issued_copies'] ?>" value="<?php
if($bookav<1){
    echo 0;
}else{ echo 1;}


?>" required> copies</p>

<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="issued"){
    echo "Already dealth";
}else{ echo
"Complete return" ;}

?>" required

<?php  
if($gt["approval_status"]!="issued"){ echo "disabled"; }

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
<?php


?>