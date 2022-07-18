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


    <h1 align="center">Sign up</h1>


    <br>

    <div id="aaaa">

    <div id="bbbb">

<form method="POST" name="cc">
    <div id="nam">
<label for="fname">First name:<br></label><input type="text" name="fname" id="fname" placeholder="Enter your Firstname" required >
<label for="sname">Sur name:<br></label><input type="text" name="surname" id="sname" placeholder="Enter your Surname" required >
  

</div> 

<br>
    <br>
<div id="cont">


<label for="phone">Phone Number:<br></label><input type="text" name="phone" id="phone" placeholder="e.g 07012345678" required >
<label for="email">E-mail:<br></label><input type="email" name="email" id="email" placeholder="Enter your email address" required >
  



</div>

<div id="cho">

    <label for="pin">Choose PIN:<br></label><input type="password" name="pin" id="pin"  placeholder="Choose a pin" required >
    <label for="pinn">Confirm PIN:<br></label><input type="password" name="pinn" id="pinn"  placeholder="Re-enter pin" required >
   
    
</div> 
    <br>
    <br>
    <input type="submit" name="login" class="login" value="Login">
    <br>
    <br>

</form>

    </div>














    </div>

</body>
</html>