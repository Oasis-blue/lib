<?php

session_start();

$connection = mysqli_connect("localhost", "root", "mysql", "lib");



if(isset($_SESSION['user'])){

   
    header("Location:req.php");


}

include("logwork.php");
include("checkses.php");








?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%">
        <?php

include("header.php");




        ?>
    </table>
    <hr style="color:black" >


    <h1 align="center">Please log in to continue</h1>

<br>
<a href="res.php">Go back to search results</a>

    <br>

    <div id="aaaa">

    <div id="bbbb">

<form method="POST">
<label for="id">Library card no.:<br></label><input type="text" name="id" id="id" class="idk" placeholder="Enter your library number" required >
    <br>
    <br>
    <label for="pass">PIN:<br></label><input type="password" name="pass" id="pass" class="pak" placeholder="Enter your pin" required >
    <br>
    <br>
    <input type="submit" name="login" class="login" value="Login">
    <br>
    <br>
<center>Don't have a Login?
<br>
<br>
<a href="signup.php">GET A LIBRARY CARD</a>
</center>
</form>

    </div>














    </div>

</body>
</html>