<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
unset($_SESSION["jskd"]);
include("exfix.php");
include("checkses.php");

include("connection.php");
if(isset($_POST["look"])){
$reqid=$_POST["lookret"];
$checkreq=mysqli_query($connection,"select * from lib.requests where requestid='$reqid'");

if(mysqli_num_rows($checkreq)<1){

$checkreq1=mysqli_query($connection,"select * from lib.requests where requesterid='$reqid'");
if(mysqli_num_rows($checkreq1)>0
){
    $_SESSION['searchret']=$reqid;
    header("Location:searchret.php");
}else{


    $errmgg="Invalid request ID or user ID";
}}else{
    $goget=mysqli_fetch_assoc($checkreq);

if($goget["approval_status"]!="issued")
{
    $errmgg="You cannot make return for this request at this time.
    <br>
    This can be either because<ul><li>
    This request is dealth(returned,reverted)or</li>
    <li>This request is pending</li>
    <li>This request has been approved but not issued</li>

    </ul>
    ";
}else{
$_SESSION['rett']=$reqid;
    header("Location:return.php");
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
    <title>Return</title>
</head>
<?php
include("resolu.php");


?>
<style>/* Table */

/* Link */
center a{
 color:blue;
}


</style>
<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>

<center>  <a href="index.php">GO HOME</a></center>
<div class="sses">
<?php echo '<p style="color:red">'.($errmgg ?? "")."</p>"  ?>
<p>Enter Request ID or User ID to make a return.</p>
<form method="POST">


<label for="lookret">Request ID or User ID: </label>
 <input type="text" name="lookret" id="lookret" class="lookret" required placeholder="Enter Request ID or User ID">
<br>
<input type="submit" name="look" class="lookre" value="Search">

</form>




</div>
<br>
<br>
<div style="min-height: 80vh;background-image: url('<?php  echo $stories[$dis]  ?>');
    background-size: cover;"></div>



</body></html>