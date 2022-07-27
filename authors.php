<?php
session_start();
include("exfix.php");
include("connection.php");
include("logwork.php");

include("checkses.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
  width: 90vw; /* Full-width */
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
  text-align: center; /* Left-align text */
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
@media (max-width:581px){

/* Input */
input{
 display:block;
 width:80vw !important;
}

}
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

<body>

    <table width="100%">
        <?php

        include("header.php");

        ?>

    </table>
    <hr style="color:black">

    <br>
    <div class="colo">
        <br>
        <center>
            <a href="index.php" style="color: white;">GO TO HOMEPAGE</a>
        </center>
        <br>
    </div><br>
   
  

<br> <center>
<input type="text" id="myInput" onkeyup="myFunctione()" placeholder="Search Author name ..">


<br>
</center>

<div style="overflow-x:auto;">
<table id="myTable" align="center">
  <tr class="header" >
   
    <th>Author</th>
  
  </tr>

<?php
$getauth=mysqli_query($connection, "SELECT * FROM lib.authors");

while($getda=mysqli_fetch_array($getauth)){

?>
  <tr>
    <td><a href="content.php?auth=<?php  echo $getda["authid"]?>"><?php  echo $getda["author"]  ?></a></td>
   </tr>
  <?php

}
?>
</table></div>
<div style="min-height:80vh ;"></div>
</body>

</html>