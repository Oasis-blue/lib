<?php


include("exfix.php");
include("connection.php");

if($_POST["loginad"]!=""){
$id=$_POST["adid"];
$key=$_POST["key"];

$logquery=mysqli_query($connection,"select * from lib.admin where adminid='$id' and keyy='$key'");
if(mysqli_num_rows($logquery)>0){
$adm=mysqli_fetch_assoc($logquery);

$_SESSION['admin']=$adm['adminid'];

}else{$err="Invalid details".' <span class="cls">&times;</span>';}

}

if($_POST["login"]!=""){
    $id=$_POST["id"];
    $pass=$_POST["pass"];
    
    $logquery=mysqli_query($connection,"select * from lib.users where userid='$id' and pin='$pass'");
    if(mysqli_num_rows($logquery)>0){
    $adm=mysqli_fetch_assoc($logquery);
    
    $_SESSION['user']=$adm['userid'];
    
    }else{$err="Invalid details".' <span class="cls">&times;</span>';}
    
    }
    






?>