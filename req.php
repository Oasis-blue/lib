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


$contid=$_GET["rssn"];
$getr=mysqli_query($connection,"select * from lib.content where contentid='$contid'");

$ret=mysqli_fetch_assoc($getr);

echo $ret["title"]



?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
</head>
<body>
    
</body>
</html>