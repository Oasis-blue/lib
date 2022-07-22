<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("exfix.php");
include("connection.php");
include("checkses.php");




$userid=$_SESSION['searchret'];

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

<br>
<div class="colo"><br>
<center>
<a href="index.php" style="color: white;">GO TO HOMEPAGE</a>
</center>
<br>
<center>
<a href="ret.php" style="color: white;">GO TO SEARCH</a>
</center>
<br> </div>
<br>

<div class="bc">
<p><b><u><?php echo "Results for User $userid"; ?></u></b></p>

<div class="cb">

<?php $goc=mysqli_query($connection,"select * from lib.requests where requesterid='$userid' and approval_status='issued'");

if(mysqli_num_rows($goc)>0){
?>
<table class="ab"><tr>
    <th>RequestID</th>
  
    <th>Title</th>
  

    </tr>
<?php
while($go=mysqli_fetch_array($goc)){


?>

<tr>
<td><?php echo $go['requestid'] ?> </td>

<td><?php
$l=$go['bookid'];
$ll=mysqli_query($connection,"select * from lib.content where contentid='$l'");
$lll=mysqli_fetch_array($ll);
$book=$lll["title"];
echo $book ?> 
</td>
<td><a href="return.php?rqid=<?php  echo  $go['requestid']  ?>" class="apr">Return</a></td>


</tr>


<?php

}
?>

</table>

<?php
}else{ echo "There is no Resource issued to this user.";}
?>





</div>



</div>








</body>
</html>