<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("checkses.php");

$bottom1='<a class="flink" href=""><b>Pending Requests('.$count.')</b></a>';




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
</head>
<body>
   
<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >

<br>
<div class="colo">
<br>
<center>
<a href="index.php" style="color: white;">GO TO HOMEPAGE</a>
</center>
<br> </div>
<br>












</body>
</html>