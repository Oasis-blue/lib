<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("checkses.php");
include("connection.php");


$fs=$_GET['id'];


$delnot=mysqli_query($connection, "delete from lib.notreqs where notid='$fs'");



header("Location:noti.php");



?>