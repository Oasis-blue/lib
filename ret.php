<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("checkses.php");

$connection = mysqli_connect("localhost", "root", "mysql", "lib");
if($_POST["look"]!=""){
$reqid=$_POST["lookret"];
$checkreq=mysqli_query($connection,"select * from lib.requests where requestid='$reqid'");

if(mysqli_num_rows($checkreq)<1){

    $errmgg="Invalid request ID";
}else{
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

<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >

<center>  <a href="index.php">GO HOME</a></center>
<div class="sses">
<?php echo '<p style="color:red">'.$errmgg."</p>"  ?>
<p>Enter Request ID to make a return.</p>
<form method="POST">


<label for="lookret">Request ID: </label>
 <input type="text" name="lookret" id="lookret" class="lookret" required placeholder="Enter Request ID">
<br>
<input type="submit" name="look" class="lookre" value="Search">

</form>




</div>
<br>
<br>
<div style="min-height: 80vh;background-image: url('<?php  echo $stories[$dis]  ?>');
    background-size: cover;"></div>



</body></html>