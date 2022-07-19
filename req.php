<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

if(!isset($_SESSION['search'])){
    header("Location:index.php");}
    $connection = mysqli_connect("localhost", "root", "mysql", "lib");

if($_GET["rssn"]==""){
    header("Location:res.php");

}



include("checkses.php");

$contid=$_GET["rssn"];
$getr=mysqli_query($connection,"select * from lib.content where contentid='$contid'");
$uss=$_SESSION['user'];
$getu=mysqli_query($connection,"select * from lib.users where userid='$uss'");
$retu=mysqli_fetch_assoc($getu);
$ret=mysqli_fetch_assoc($getr);
$useridd=$retu["userid"];
$bookid=$ret["contentid"];
$date= date("d-m-Y") ;
if($ret["copies"]<1){
    $def=0;
    $re="Not Available";
    $pick="disabled";
}else{$def=1;
$re="Send Request";}


if($_POST["submit"]!=""){
    $tim=date("h:i:sa");
$cop=$_POST["nocop"];
$sendreq=mysqli_query($connection,"insert into lib.requests(requesterid, bookid, no_of_copies, date_of_req, approval_status,reqtime) values('$useridd','$bookid','$cop','$date','pending','$tim')");


if($sendreq==1){
    $suc='Request sent successfully. Your request will be attended to shortly
    <br>
    Please note that your request can only be approved on working days and requests are accepted on a first come first serve basis.<br><a href="index.php">Go to homepage</a>
    ';
}else{$suc="failed to send request. please try again.";}

}





?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request </title>
</head>
<body>
<table width="100%" class="tabbb">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >

<br>

<br>
<center>
<a href="res.php">GO BACK</a>
</center>
<br>
<center><p>
<?php echo $suc ?>
</p></center>
<br>

<div class="holder">
  <center>  <div class="y">
<div class="clicker">

<h1><?php echo $ret["title"] ?>[<?php echo $ret["yearofpub"]  ?>]</h1>


</div>






<div class="clicker">

<h2>by <?php echo $ret["author"] ?></h2>


</div>


<div class="clicker">

<h2>Number of Available copies: <?php echo $ret["copies"] ?></h2>


</div>
<br>
<br>

    </div></center><br><br>


<form method="POST">

<div class="clicker"> Make request for <input type="number" min="0" max="<?php echo $ret["copies"];  ?>" name="nocop" class="cop" value="<?php echo $def ?>"  <?php echo $pick ?> > copy(ies) of the above.</div>

<br> <div class="clicker"><input type="submit" name="submit" class="req" <?php echo $pick ?>  value="<?php echo $re ?> ">

</div>
</form>

</div>
<br>
<br>
<br>
<div style="min-height: 50vh; background-color: #025859;"></div>
</body>
</html>