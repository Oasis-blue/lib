<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}
include("checkses.php");
$connection = mysqli_connect("localhost", "root", "mysql", "lib");








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
</body>
</html>