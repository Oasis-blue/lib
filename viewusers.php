<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("connection.php");
include("checkses.php");


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>View users</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>


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

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
@import url("//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Body */
body{
 background-color:rgba(236,240,241,0.54);
}

/* Heading */
center h1{
 font-family:'Open Sans', sans-serif;
}
/* Table Data */
#myTable tr td{
 background-color:#a7dbd8;
}

/* Heading */



</style>
<script>
function myFunctione() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script>
function myFunctionne() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputn");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<body>
    <table width="100%"><?php
    $bottom7='<a class="flink" href="viewusers.php"><b>View Users</b></a>';
    include("header.php"); ?></table>




    <hr>

    <div class="colo">
<br>
<center>
<a href="index.php" >GO TO HOMEPAGE</a>
</center>
<br> </div>
<center>
<h1>Search Users by Name or User ID</h1>
</center>


    

    <br>
<input type="text" id="myInput" onkeyup="myFunctione()" placeholder="Search by User ID.."><br>
<input type="text" id="myInputn" onkeyup="myFunctionne()" placeholder="Search by name..">
<table id="myTable" align="center">
  <tr class="header" >
    <th style="width:40%;">User ID</th>
    <th style="width:40%;">Full Name</th>
    <th></th>
    <th></th>
  </tr>

<?php

$getusers=mysqli_query($connection,"select * from lib.users");
while($getda=mysqli_fetch_array($getusers)){

?>
  <tr>
    <td><?php  echo $getda["userid"]  ?></td>
    <td><?php  echo $getda["surname"]  ?> <?php  echo $getda["fname"]  ?></td>
    <td><?php  $r= $getda["userid"]; echo '<a href="userdetails.php?id='."$r".'">Details</a>'; ?></td>
    <td><?php if($getda["status"]==0){ echo '<a href="activate.php?id='."$r".'" style="color:green">Activate</a>';}else{

echo '<a href="deactivate.php?id='."$r".'" style="color:red">Deactivate</a>';

    } ?></td>
  </tr>
  <?php

}
?>
</table>
<div style="min-height:80vh ;"></div>
</body>
</html>