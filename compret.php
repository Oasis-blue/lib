<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
if($_SESSION['rett']==""
or
$_SESSION["date"]=="" or
$_SESSION["copies_num"]=="" or
$_SESSION["fine"]==$fine or
//$_SESSION["finetotal"]=="" or
$_SESSION["bookid"]==""
){
    header("Location:index.php");

}
include("connection.php");
include("checkses.php");
$rqid=$_SESSION['rett'];


$days=$_SESSION["days"];
$date=$_SESSION["date"];
$num=$_SESSION["copies_num"];
$fine=$_SESSION["fine"];
$getfine=$_SESSION["finetotal"];
$l=$_SESSION["bookid"];


$goc=mysqli_query($connection,"select * from lib.requests where requestid='$rqid'");
$gt=mysqli_fetch_assoc($goc);
if(isset($_POST["appro"])){
if($_POST["appro"]!=""){

    $l=$gt['bookid'];
    $ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
    $lll=mysqli_fetch_array($ll);
   

$admin=$_SESSION['admin'];

if(isset($_POST["paid"])){
    
   
$paidornot=$_POST["paid"];
}
if($gt["approval_status"]=="issued"){
$regreturn=mysqli_query($connection,"insert into lib.returns 
(request_id, bookid, date_returned, copies_returned, recieved_by, fine, paid) 
values('$rqid', '$l', '$date', '$num', '$admin', '$getfine', '$paidornot' ) ");

if($regreturn==1){
if($num+$gt["no_of_copies_returned"]

==$gt["issued_copies"]){
    $updreq1=mysqli_query($connection,"update lib.requests set approval_status='returned' where requestid='$rqid'");
}

//if($gt["paid"]=="paid"){



//}



$updreq=mysqli_query($connection,"update lib.requests set actual_return_date='$date', return_recieved_by='$admin', no_of_copies_returned=no_of_copies_returned+$num, days_passed=days_passed+$days where requestid='$rqid'")

;

if($updreq==1){
    $upcont=mysqli_query($connection,"update lib.content set copies=copies+$num where contentid=$l");

    $msssg="Return successful";
}

}else{

    $mssgerr="failed to register return please contact programmer.";
}



}else{

    $mssgerr="this is not a valid issued request.";
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
    <title>Complete return</title>
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
 border-style:none !important;">    <br>      <br> 
  <center>  <a href="return.php">GO BACK</a></center>
<div class="alrt">
    <p style="color:green; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><u><?php echo $msssg ?></u></p>

    <p style="color:red; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><u><?php echo $mssgerr ?></u></p>


    <p>Complete return for user 
    
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

<p>Returning <?php  echo $num ?> out of <?php echo $gt["issued_copies"] ?> issued.</p>

</div>
<div class="fm">
<form method="POST"><p>Expected return date: <?php echo $gt['expected_return_date'] ?></p>
<p>Days passed: <?php 
echo $days;
?>
</p>

<p>Fine per day: <?php  echo $fine;  ?></p>


<p>Total fine to be paid: <?php echo $getfine ?></p>

<?php

if($getfine>0){

?>
<table><tr><td>
<label for="paid">Paid</label><input type="radio" name="paid" id="paid" value="paid" ></td><td>
<label for="notpaid">Not Paid</label><input type="radio" name="paid" id="notpaid" value="not paid" ></td></tr></table>
    <?php
}

?>
<br>
<input type="submit" name="appro" class="appro" value="<?php 
if($gt["approval_status"]!="issued"){
    echo "Already dealth";
}else{ echo
"Make return" ;}

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