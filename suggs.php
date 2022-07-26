<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("checkses.php");






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Suggestions</title>
</head>
<?php
include("resolu.php");


?>

<style>
    #myInput, #myInputn {
      box-sizing: border-box;
  background-image: url('searchicon.svg'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100vw; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr td:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
@import url("//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Body */
body{
 background-color:rgba(236,240,241,0.54);
}

/* Heading */
h1{
 font-family:'Open Sans', sans-serif;
 text-align: center;
}

</style>

<body>
    

<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr style="color:black" >


<div class="heading"><h1>Suggestions</h1></div>
<div style="overflow-x:auto;">
<table id="myTable" align="center">
  <tr class="header" >
    <th >Date of suggestion</th>
    <th >Title</th>
    <th >Author</th>
    <th >Type</th>
    <th >Year of pub</th>
    <th >Additional Info</th>
    <th >Suggested by</th>
    <th >email</th>
    <th >phone</th>
    <th></th>
  </tr>

<?php

$getusers=mysqli_query($connection,"select * from lib.sugg");
while($getda=mysqli_fetch_array($getusers)){

?>
  <tr>
    <td><?php  echo $getda["date"]  ?></td>
    <td><?php  echo $getda["title"]  ?> </td>
    <td><?php  echo $getda["author"]  ?> </td>
    <td><?php  $ggt= $getda["typeid"];
    $dt=mysqli_query($connection, "select * from lib.restype where typeid='$ggt' ");
    $typp=mysqli_fetch_assoc($dt);
    echo $typp["type"];
    
    ?> </td>
    <td><?php  echo $getda["yearofpub"]  ?> </td>
    <td><?php  echo $getda["additional"]  ?> </td>
    <td><?php  echo $getda["userid"]  ?> </td>
    <td><?php  echo $getda["email"]  ?> </td>
    <td><?php  echo $getda["phone"]  ?> </td>





    <td><?php  $r= $getda["id"]; echo '<a href="removesugg.php?id='."$r".'">Remove</a>'; ?></td>
  </tr>
  <?php

}
?>
</table></div>
<div style="min-height:80vh ;"></div>

</body>
</html>