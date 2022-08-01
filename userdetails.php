<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
if(!isset($_GET['id'])){

   
    header("Location:viewusers.php");


}
include("exfix.php");
include("connection.php");
include("checkses.php");

$user=$_GET['id'];

$_SESSION["jskd"]="yo";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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

center h1{
 font-family:'Open Sans', sans-serif;}
 
 /* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Underline text tag */
.dets h2 u{
 font-family:'Open Sans', sans-serif;
}

/* Table */


/* Dets */
.dets{
 display:flex;
 align-content:center;
 justify-content:center;
 align-items:center;
 flex-direction:column;
}
.dets tr th{
 text-align:left;
 width: 50%;   padding: 12px 20px 12px 40px;
}
.dets tr td{ width: 50%;   padding: 12px 20px 12px 40px;}
.grt tr {
   background-color:  #bdc3c7;

}
 
 .grt{
    min-width: 60%;

    
 }
 
 
/* Apr */
.apr{

 color:#27ae60;
 background-color:#ecf0f1;
}

/* Deny */
.deny{

 background-color:#ecf0f1;
 color:#e74c3c;
}

/* Deny (hover) */
.deny:hover{
    background-color:#e74c3c;
 color:#ffffff;
}

/* Apr (hover) */
.apr:hover{
    background-color:#27ae60;
 color:white;
}

 .apr, .deny{

border-radius: 10px;
   
 padding-left:18px;
 padding-right:18px;
 padding-top:12px;
 padding-bottom:12px;

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
    td = tr[i].getElementsByTagName("td")[6];
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
<hr>

<br>
<div class="colo">
<br>
<center>
<a href="index.php">GO TO HOMEPAGE</a>
</center>
<br> </div><br>
<center><a href="viewusers.php">GO BACK</a></center>
<center><h1>User <?php

echo $user;
?></h1></center>
<div class="dets">
<center><h2><u>Personal Information</u>

</h2></center>

<table class="grt">
<tr><th>ID</th>
<td><?php echo $user ?></td>
</tr>
<tr>
<th>Surname</th>
<?php  $ge=mysqli_query($connection, "select * from lib.users where userid='$user'");
$ud=mysqli_fetch_assoc($ge);
?>
<td><?php echo $ud["surname"]  ?></td>
</tr>
<tr>
<th>First Name</th>

<td><?php echo $ud["fname"]  ?></td>


</tr>
</table>


</div>

<div class="dets">
<center><h2><u>Contact Information</u>

</h2></center>

<table  class="grt">

<tr>
<th>E-mail</th>

<td><?php echo $ud["email"]  ?></td>
</tr>
<tr>
<th>Phone Number</th>

<td><?php echo $ud["phonenumber"]  ?></td>


</tr>
</table>


</div>
<div class="dets">
<center><h2><u>Requests</u>

</h2></center>
</div>

<input type="text" id="myInput" onkeyup="myFunctione()" placeholder="Search by Request ID.."><br>
<input type="text" id="myInputn" onkeyup="myFunctionne()" placeholder="Search by status..">
<br><div style="overflow-x:auto;">
<table id="myTable" align="center">
  <tr class="header" >
    <th >Request ID</th>
    <th >Resource ID</th>
    <th>Date of request</th>
    <th>Copies requested</th>
    <th>Copies issued</th>
    <th>Copies returned</th>
    <th>Status</th>
    <th></th>
    <th></th>
  </tr>

<?php

$getreq=mysqli_query($connection,"select * from lib.requests where requesterid='$user'");
while($getda=mysqli_fetch_array($getreq)){

?>
  <tr>
    <td><?php  echo $getda["requestid"]  ?></td>
    <td><?php  echo $getda["bookid"]  ?></td>
    <td><?php  echo $getda["date_of_req"]  ?></td>
    <td><?php  echo $getda["no_of_copies"]  ?></td>
    <td><?php  echo $getda["issued_copies"]  ?></td>
    <td><?php  echo $getda["no_of_copies_returned"]  ?></td>
    <td><?php  echo $getda["approval_status"]  ?></td>

   <?php  
   if($getda["approval_status"]=="pending"){?>
   
   <td><a href="approve.php?rqid=<?php  echo  $getda['requestid']  ?>" class="apr">Approve</a></td>
<td><a href="deny.php?rqid=<?php  echo  $getda['requestid']  ?>" class="deny">Deny</a></td> 

<?php
   }elseif($getda["approval_status"]=="approved"){
?>

<td><a href="issue.php?rqid=<?php  echo  $getda['requestid']  ?>" class="apr">Issue</a></td>
<td><a href="revert.php?rqid=<?php  echo  $getda['requestid']  ?>" class="deny">Revert</a></td>


<?php

}elseif($getda["approval_status"]=="issued"){

?>

<td><a href="return.php?rqid=<?php  echo  $getda['requestid']  ?>" class="apr">Return</a></td>



<?php
}

?>
  </tr>
  <?php

}
?>
</table></div>
<div style="min-height:80vh ;"></div>

</body>
</html>