<?php
session_start();

if(isset($_SESSION['user'])){


unset($_SESSION['user']);

session_destroy();
header("Location:index.php");

}

if(isset($_SESSION['admin'])){


    unset($_SESSION['admin']);
    
    session_destroy();
    header("Location:index.php");
    
    }
    
    
    header("Location:index.php");




?>