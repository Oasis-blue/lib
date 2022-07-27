<?php


include("connection.php");



include("exfix.php");

function random_num($length)
{
    $text = "";    if ($length < 5) 
{
        $length = 5;    }    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        # code...

        $text .= rand(0, 9);    }    return $text;
}

if($_POST["sign"]!=""){

   if( $_POST["pin"]==$_POST["pinn"]){

$fname=    $_POST["fname"];
$sname=    $_POST["surname"];
$email=    $_POST["email"];
 $phone=   $_POST["phone"];
  $pin=  $_POST["pin"];
$userid=random_num(5);
$ch3ck=mysqli_query($connection,"select * from lib.users where userid='$userid'");
if(mysqli_num_rows($ch3ck)>0){
    $userid=random_num(5);
}
$signupgo=mysqli_query($connection,"insert into lib.users(userid, fname, surname, email, phonenumber, pin, status) values('$userid','$fname','$sname','$email','$phone','$pin', '1')");
if($signupgo==1){
    $mssg="signup successful, your library ID is <u>$userid</u>."
    .'<br>You will need this to Log in.<br><a href="log.php">Login here</a>';
}else{

    $mssg="signup failed, please try again.";
}



   }else{$signerr="passwords do not match.";
$re1=$_POST["fname"];
$re2=$_POST["surname"];
$re3=$_POST["email"];
$re4=$_POST["phone"];





}




}









?>