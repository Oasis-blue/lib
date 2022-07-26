<?php

session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
include("exfix.php");
include("checkses.php");
include("connection.php");


$fs=$_GET['id'];


$delnot=mysqli_query($connection, "delete from lib.sugg where id='$fs'");



header("Location:suggs.php");



?>