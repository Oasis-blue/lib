<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

//if(!isset($_SESSION['search'])){
  //  header("Location:index.php");}
    
include("exfix.php");
    include("connection.php");

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

$gonot='
<br><br><form method="POST">
<div class="clicker"><input type="submit" name="not"   value="Notify me when this is available.">

</div>
</form>
';


}else{$def=1;
$re="Send Request";}

if($_POST["not"]!=""){


    $sendreqq=mysqli_query($connection,"insert into lib.notreqs(userid, bookid, date, time) values('$useridd','$bookid','$date','$tim')");

    if($sendreqq==1){
        $suc='Request sent successfully. You will be notified once this resource becomes available;
        <br>
       ';
    }else{$suc="failed to send request. please try again.";}


}

if($_POST["submit"]!=""){

$checkif=mysqli_query($connection,"select * from lib.requests where requesterid='$useridd' and bookid='$bookid' and approval_status!='returned'");
if(mysqli_num_rows($checkif)>0){
    $suc="<span style='color:red'>You cannot make a request for this resource at this time.<br>This is because you already made a request for this recource that has not been settled</span>";


}else{
    $tim=date("h:i:sa");
$cop=$_POST["nocop"];
$sendreq=mysqli_query($connection,"insert into lib.requests(requesterid, bookid, no_of_copies, date_of_req, approval_status,reqtime) values('$useridd','$bookid','$cop','$date','pending','$tim')");


if($sendreq==1){
    $suc='<span style="color:green">Request sent successfully. Your request will be attended to shortly
    <br>
    Please note that your request can only be approved on working days and requests are accepted on a first come first serve basis.</span><br><a href="index.php">Go to homepage</a>
    ';
}else{$suc="<span style='color:red'>failed to send request. please try again.</span>";}

}
}
if($_POST["download"]!=""){

    $qq=mysqli_query($connection, "SELECT * FROM lib.reqdown where contentid='$bookid' and userid='$useridd' limit 1");
if(mysqli_num_rows($qq)>0){
$qqd=mysqli_fetch_assoc($qq);
$reid=$qqd['reid'];
$appby=$qqd['approvedby'];
$wwd=mysqli_query($connection,"INSERT INTO lib.requests (requesterid, bookid, date_of_req, approval_status,reqtime, approved_by) values('$useridd','$bookid','$date','downloaded','$tim', '$appby')");
$erf=mysqli_query($connection,"DELETE FROM lib.reqdown where reid='$reid'");

}else{

    $wwd=mysqli_query($connection,"INSERT INTO lib.requests (requesterid, bookid, date_of_req, approval_status,reqtime) values('$useridd','$bookid','$date','downloaded','$tim')");



}







}


if($_POST['reqqd']!=""){

$zgsd=mysqli_query($connection, "SELECT * FROM lib.reqdown where contentid='$bookid' and userid='$useridd' and access!='granted'");

if(mysqli_num_rows($zgsd)>0){

    $suc="<span style='color:red'>You cannot make request to access this file at this time.<br>This is because you still have a pending request for it.</span>";

}else{

$afa=mysqli_query($connection, "INSERT INTO lib.reqdown (contentid, date, userid) values('$bookid','$date','$useridd')");

if($afa==1){
    $suc='<span style="color:green">Request sent successfully. Your request will be attended to shortly</span>';

}else{

    $suc="<span style='color:red'>failed to send request. please try again.</span>"; 
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
    <title>Request </title>

    <style>/* Body */

  /* Body */
body{
 background-color:#ecf0f1;
}

/* Reqra */
.y form .reqra{
 padding-left:12px;
 padding-right:12px;
 padding-top:6px;
 padding-bottom:6px;
 background-color:#27ae60;
 border-top-left-radius:10px;
 border-top-right-radius:10px;
 border-bottom-left-radius:10px;
 border-bottom-right-radius:10px;
 border-color:#27ae60;
 font-size: 16px;
 cursor: pointer;
}


.y form .reqra:hover{
background-color: mediumseagreen;

}

</style>
</head>

<?php
include("resolu.php");


?>

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
<center><p><b>
<?php echo $suc ?></b>
</p></center>
<br>

<div class="holder" >
  <center>  <div class="y">
<div class="clicker">

<h1><?php echo $ret["title"] ?>[<?php echo $ret["yearofpub"]  ?>]</h1>


</div>






<div class="clicker">

<h2>by <?php echo $ret["author"] ?></h2>


</div>


<?php

if($ret["matinfo"]=="softcopy"){



if($ret["catid"]=="pri"){


$checkaccess=mysqli_query($connection,"select * from lib.reqdown where contentid='$bookid' and userid='$useridd' and access='granted'")
;

if(mysqli_num_rows($checkaccess)>0){
?>



<form method="POST">

<h3>You have been granted access to this content.</h3>




<div class="clicker"><a class="" href="upload/<?php echo $ret['link']?>" target="_blank"  onclick="fdd()"><button type="button" class="reqr">Download</button></a>
</div>
<input type="submit" hidden  name="download" id="myCheck">
<script>
function fdd() {
  document.getElementById("myCheck").click();
}
</script>

</form>

<br><br>
</div>






    <?php
}else{



?>




<form method="POST">


<div class="clicker"><button type="submit" disabled class="reqrad"  >Download</button>
</div>


<h3>This is a Material is labelled private,<br> you can request access to download below</h3>

<div class="clicker"><button type="submit" name="reqqd" class="reqra"  value="reqqd">Request Access</button>
</div>



</form>

<br><br>
</div>




<?php
}
}else{


?>

<form method="POST">


<div class="clicker"><a class="" href="upload/<?php echo $ret['link']?>" target="_blank"  onclick="fdd()"><button type="button" class="reqr">Download</button></a>
</div>
<input type="submit" hidden  name="download" id="myCheck">
<script>
function fdd() {
  document.getElementById("myCheck").click();
}
</script>

</form>

<br><br>
</div>



<?php
}
}else{
?>

<div class="clicker">

<h2>Number of Available copies: <?php echo $ret["copies"] ?></h2>


</div>
<br>
<br>

    </div></center><br><br>


<form method="POST">

<div class="clicker"> Make request for <input type="number" min="1" max="<?php echo $ret["copies"];  ?>" name="nocop" class="cop" value="<?php echo $def ?>"  <?php echo $pick ?> > copy(ies) of the above.</div>

<br> <div class="clicker"><input type="submit" name="submit" class="req" <?php echo $pick ?>  value="<?php echo $re ?> ">

</div>
</form>

<br>
<?php  echo $gonot;   ?>


</div>
<br>

<?php

}



?>
<br>
<br>
<div style="min-height: 50vh; "></div>
</body>
</html>