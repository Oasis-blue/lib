<?php
session_start();
if(isset($_GET['retp'])){
$type = $_GET['retp'];


}elseif(isset($_GET['auth']))
{
    $type='author';
$au=$_GET['auth'];




}else{
    $type='';
}
include("exfix.php");
include("connection.php");
include("logwork.php");

include("checkses.php");

$getaut=mysqli_query($connection, "SELECT * FROM lib.authors where authid='$au'");
$ga=mysqli_fetch_assoc($getaut);
$aau=$ga['author'];

switch ($type) {
    case 'enc':
        $thehead = 'Encyclopedia';
$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");

        break;
    case 'arti':
        $thehead = 'Article/Journal';
$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");

        break;
    case 'audb':
        $thehead = 'Audiobooks';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'hndt':
        $thehead = 'Handouts';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'lit':
        $thehead = 'Literature';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'news':
        $thehead = 'Newspaper/Magazine';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'txtb':
        $thehead = 'Textbooks';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'phot':
        $thehead = 'Photo Library';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'psq':
        $thehead = 'Past Questions';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'resh':
        $thehead = 'Research';

$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;
    case 'othe':
        $thehead = 'Other Publications';
$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
        break;

        case 'vid':
            $thehead = 'Videos';
    $getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid='$type'");
            break;
            case 'author':
                $thehead = 'Author:'.$aau;
        $getbooks=mysqli_query($connection, "SELECT * FROM lib.content where authid='$au'");
                break;
    
    case 'books':
        $thehead = 'All books';
$getbooks=mysqli_query($connection, "SELECT * FROM lib.content where typeid=('txtb' or 'hndt' or 'lit' or 'audb' or 'enc')");

        break;

    default:
        $thehead = '';

        $getbooks=mysqli_query($connection, "SELECT * FROM lib.content");


        break;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGUE-<?php echo $thehead ?></title>
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
  width: 33vw; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
#myInputna {
      box-sizing: border-box;
  background-image: url('searchicon.svg'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 32vw; /* Full-width */
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

<script>
function myFunctionnee() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputna");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {


    
    td = tr[i].getElementsByTagName("td")[2];
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
    <?php
    if (isset($_GET['retp'])) { ?>


        <h1>Displaying all under <u><?php echo $thehead ?></u></h1>



    <?php
    }

    ?>

<br> <center>
<input type="text" id="myInput" onkeyup="myFunctione()" placeholder="Search by Title ..">
<input type="text" id="myInputn" onkeyup="myFunctionne()" placeholder="Search by Author..">
<input type="text" id="myInputna" onkeyup="myFunctionnee()" placeholder="Search by Keywords..">


<br>
</center>

<div style="overflow-x:auto;">
<table id="myTable" align="center">
  <tr class="header" >
    <th style="width:20%;">Title</th>
    <th style="width:20%;">Author</th>
    <th>Keywords</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>

<?php


while($getda=mysqli_fetch_array($getbooks)){

?>
  <tr>
    <td><?php  echo $getda["title"]  ?></td>
    <td><?php  echo $getda["author"]  ?></td>
    <td><?php  echo $getda["tags"]  ?></td>
    <td><?php  echo $getda["matinfo"]  ?></td>
    <td><?php    
    $cat=$getda["catid"];
    $gr=mysqli_query($connection, "select * from lib.cate where catid='$cat'");

    $cget=mysqli_fetch_assoc($gr);
    $gy=$cget['category'];
    
    echo $gy  ?></td>
    <td> <?php
                    if (isset($_SESSION['user'])) {
                        $cid = $getda["contentid"];
                        $reqm = '<a class="view" href="req.php?rssn=' . $cid . '"' . ">Request</a>";
                    } elseif (isset($_SESSION['admin'])) {

                        $reqm = '<a class="view" href="upload/' . $getda['link'] . '"' . ' target="_blank">View</a>';
                    } else {
                        $reqm = '<a class="view" href="log.php">Request</a>
';
                    }


                    echo $reqm; ?></td>
  </tr>
  <?php

}
?>
</table></div>
<div style="min-height:80vh ;"></div>
</body>

</html>