<?php

session_start();

include("connection.php");



if(isset($_SESSION['user'])){

   
    header("Location:req.php");


}

include("exfix.php");
include("logwork.php");
include("checkses.php");



if(isset($_SESSION['user'])){
    header("Location:req.php");
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
</head><style>
body{
 background-image:url("https://images.unsplash.com/photo-1523240795612-9a054b0db644?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNTc5fDB8MXxzZWFyY2h8N3x8ZSUyMGxpYnJhcnl8ZW58MHx8fHwxNjU4MjY3MzI0&ixlib=rb-1.2.1&q=80&w=2560");
 background-size:auto;
 background-position-y:51%;
 background-position-x:49%;
}



</style>
<?php
include("resolu.php");


?>

<body>
    <table width="100%" class="tabbb">
        <?php

include("header.php");




        ?>
    </table>
    <hr style="color:black" >


    <h1 align="center">Please log in to continue</h1>

<br><center>
<a href="res.php">Go back to search results</a>
</center>
    <br>

    <div id="aaaa">

    <div id="bbbb">
    <div class="looo">
<form method="POST">
  
<label for="id">Library card no.:<br></label><input type="text" name="id" id="id" class="idk" placeholder="Enter your library number" required >
    <br>
    <br>
    <label for="pass">Password:<br></label><input type="password" name="pass" id="pass" class="pak" placeholder="Enter your pin" required >
    <br>
    <br>
    <input type="submit" name="login" class="login" value="Login">
    <br>
    <br>
<center>Don't have a Login?
<br>
<br>
<a href="signup.php">REGISTER</a>
</center>
   
</form>
</div>
    </div>














    </div>
    <div style="min-height: 40vh ;"></div>
</body>
</html>