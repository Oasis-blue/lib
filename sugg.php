<?php
session_start();
if(!isset($_SESSION['user'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("checkses.php");
include("connection.php");
$title=$_POST["title"];
$author=$_POST["author"];
$typeid=$_POST["type"];
$yearofpub=$_POST["year"];
$add=$_POST["add"];
$email=$_POST["email"];
$phone=$_POST["phone"];

$date=date("d-m-Y");
$userr=$_SESSION['user'];
if($_POST["sug"]!=""){

$sendsug=mysqli_query($connection, "insert into lib.sugg (title, author, typeid, yearofpub, additional, userid, email, phone, date) values('$title','$author','$typeid','$yearofpub','$add','$userr','$email','$phone','$date')");
if($sendsug==1){

$msg='<p>Your suggestion has been submitted.<a href="index.php">Go to homepage</a></p>';


}else{$msg='<p>Failed to submit suggestion, please try again.<a href="index.php">Go to homepage</a></p>';}


}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a suggestion</title>
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


<div style="font-family: poppins; min-height: 100vh; min-width: 100vw; display: flex; align-items: center; flex-direction: column; justify-content: center;">

<h1 style=" text-align:center;">
Couldn't find what you were looking for?<br>
Suggest a resource to be added to our database.


</h1>
<?php     echo $msg     ?>

<div class="vv" style="border: 1px solid black; border-radius: 10px;">

<form method="POST">
    
<br>
    <label for="title">Title</label><br>
<input type="text" name="title" class="inp" id="title" required>

<br>

    <label for="author">Author</label><br>
<input type="text" name="author" class="inp" id="author">

<br>

<label for="type">Type:</label><br>
<select name="type" id="type" class="sell">
<?php $select=mysqli_query($connection, "SELECT * FROM lib.restype");
while($gettype=mysqli_fetch_array($select)){
?>

<option value="<?php echo $gettype['typeid']; ?>"><?php  echo $gettype['type'] ?></option>

<?php } ?>
</select>
<br>
<label for="year">Year of Publication</label><br>
<input type="text" name="year" class="inp" id="year">

<br>

<label for="add">Additional Information(optional):</label><br>
<textarea name="add" class="txtt" id="add"></textarea>
<br>
<label for="ph">Phone</label><br>
<input type="text" name="phone" class="inp" id="ph">

<br>
<label for="em">E-mail</label><br>
<input type="email" name="email" class="inp" id="em" >

<br>
<br><center>
<input type="submit" name="sug" class="sug" value="Submit suggestion"></center>
</form>
<br>
</div>





</div>








</body>
</html>