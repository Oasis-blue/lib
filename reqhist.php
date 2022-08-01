<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("connection.php");
include("checkses.php");



$_SESSION["jskd"]="yo";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request History</title>
</head>
<?php
include("resolu.php");


?>

<style>
/* Link */



#myInput, #myInputn, #myInputnn, #myInputnnn, #myInputnnnn {
      box-sizing: border-box;
  background-image: url('searchicon.svg'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 97vw; /* Full-width */
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
    td = tr[i].getElementsByTagName("td")[7];
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
  input = document.getElementById("myInputnn");
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
function myFunctionneee() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputnnn");
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

<script>
function myFunctionneeee() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputnnnn");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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







<div class="dets">
<center><h2><u>Requests History</u>

</h2></center>
</div>

<input type="text" id="myInput" onkeyup="myFunctione()" placeholder="Search by Request ID.."><br>
<input type="text" id="myInputn" onkeyup="myFunctionne()" placeholder="Search by status..">
<br>
<input type="text" id="myInputnn" onkeyup="myFunctionnee()" placeholder="Search by requester..">
<br>
<input type="text" id="myInputnnn" onkeyup="myFunctionneee()" placeholder="Search by book id..">
<br>
<input type="text" id="myInputnnnn" onkeyup="myFunctionneeee()" placeholder="Search by date of request..">
<br><div style="overflow-x:auto;">
<table id="myTable" align="center">
  <tr class="header" >
    <th >Request ID</th>
    <th >Requester ID</th>
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

$getreq=mysqli_query($connection,"select * from lib.requests");
while($getda=mysqli_fetch_array($getreq)){

?>
  <tr>
    <td><?php  echo $getda["requestid"]  ?></td>
    <td><?php  echo $getda["requesterid"]  ?></td>
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