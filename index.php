<?php
session_start();

$connection = mysqli_connect("localhost", "root", "mysql", "lib");
include("logwork.php");

include("checkses.php");

$selectfac = mysqli_query($connection, "SELECT * FROM lib.faculty");
$selectdep = mysqli_query($connection, "SELECT * FROM lib.dept");










if ($_POST['seek'] != "") {




  $byy = $_POST['by'];
  $needle = "%" . $_POST['needle'] . "%";

  $by = $byy;




  $by = $_POST['by'];
  if ($_POST['fac'] == "") {
    $fac = "";
  } else {
    $facc = $_POST['fac'];
    $fac = "and facid='$facc'";
  }
  if ($_POST['dep'] == "") {
    $dep = "";
  } else {
    $depp = $_POST['dep'];
    $dep = "and deptid='$depp'";
  }
  if ($_POST['year'] == "") {
    $year = "";
  } else {
    $yearr = $_POST['year'];
    $year = "and year='$yearr'";
  }



  $search = "select * from lib.content where $by like '$needle' $fac $dep $year ";


  $_SESSION['search'] = $search;


  header("Location:res.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gr8tson tech</title>
</head>



<body>

  <table width="100%" class="tabb">


  <?php  include("header.php"); ?>
    <!---->
    <tr height="10%" class="se">
      <td>
        <p class="qu">Looking for something?</p>
        <br>
        <form method="POST">
          <div class="sear">

            <label for="by">Search by:</label><select name="by" id="by" class="searchselect">

              <option value="title">Title</option>
              <option value="tags">Keyword</option>
              <option value="author">Author</option>

            </select>




            <label for="fac">Faculty:</label><select name="fac" id="fac" class="searchselect">

              <option value="">All faculties</option>
              <?php while ($getfac = mysqli_fetch_array($selectfac)) { ?>
                <option value="<?php echo $getfac["facid"]; ?>"><?php echo $getfac["faculty"]; ?></option>

              <?php } ?>
            </select>

            <label for="dep">Department:</label><select name="dep" id="dep" class="searchselect">

              <option value="">All departments</option>

              <?php while ($getdep = mysqli_fetch_array($selectdep)) { ?>
                <option value="<?php echo $getdep["deptid"]; ?>"><?php echo $getdep["deptname"]; ?></option>

              <?php } ?>
            </select>

            <label for="year">Year of publication:</label><select name="year" id="year" class="searchselect">
              <option value="">All time</option>
              <option value="<?php echo date("Y") ?>">This year</option>
              <option value="">Within 5 years</option>
              <option value="">This decade</option>
              <option value="">2000-2010</option>
            </select>

            <input type="text" class="searchbox" name="needle" placeholder="Enter your search here">
            <button type="submit" value="go" class="searchbtn" name="seek"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
              </svg></button>

          </div>
        </form>
      </td>
    </tr>

    <tr height="75%" class="bod">
      <td></td>
    </tr>


  </table>












</body>

</html>