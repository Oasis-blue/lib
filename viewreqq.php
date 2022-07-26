<?php

session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("connection.php");
include("checkses.php");
$userr=$_SESSION['user'];
$checkres=mysqli_query($connection,"select * from lib.requests where requesterid='$userr'");
if(mysqli_num_rows($checkres)<1){$disc="you have no requests at the moment";}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My requests</title>
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


<br><div class="colo">
    <br>
  
<center>
<a href="index.php">Go to homepage</a></center>

<center>
<p>All requests will be reviewed within (3) working days.</p>
</center>

</div>
<br>


<br><div style="overflow-x:auto;">
<table class="tbb" align="center" width="90%" cellpadding="4%">

<tr class="frow">

<th class="thh">Request ID</th>

<th class="thh">Title</th>
<th class="thh">Resource Type</th>
<th class="thh">No. of copies requested</th>

<th class="thh">Date of request</th>
<th class="thh">Approval status</th>






</tr>
<?php
if(mysqli_num_rows($checkres)<1){$disc="you have no requests at the moment";



?>



<tr  class="rrow">
<td colspan="7" class="tdd">
<center><?php echo $disc  ?></center></td>
</tr>
<?php

}else{
?>




<?php
while($getres=mysqli_fetch_array($checkres)){

?>
<tr class="rrow">
<td class="tdd"><?php echo $getres["requestid"] ?></td>





<td class="tdd"><?php 
$booo=$getres["bookid"];
$checkty=mysqli_query($connection, "select * from lib.content where contentid='$booo'");
$gettt=mysqli_fetch_assoc($checkty);
echo $gettt["title"];


?></td>

<td class="tdd"><?php
$booo=$getres["bookid"];
$checkty=mysqli_query($connection, "select * from lib.content where contentid='$booo'");
$gettt=mysqli_fetch_assoc($checkty);
$typ=$gettt["typeid"];
$checktyp=mysqli_query($connection, "select * from lib.restype where typeid='$typ'");
$getyp=mysqli_fetch_assoc($checktyp);
echo $getyp['type'];



?></td>

<td class="tdd"><?php
echo $getres["no_of_copies"];

?></td>

<td class="tdd"><?php
echo $getres["date_of_req"];

?></td>

<td class="tdd"><?php

echo $getres['approval_status'];
?></td>



<td>
<?php
if ($getres['approval_status']=='pending'){
$cid=$getres["bookid"]; $reqm='<a class="view" href="cancel.php?rssn='.$cid.'"'.">Cancel request</a>";
}
echo $reqm;

?>
</td>
</tr>
<?php } }?>
</table>
</div>

<div style="min-height:80vh ;"></div>





</body>
</html>