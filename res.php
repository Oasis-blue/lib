<?php


session_start();

$connection = mysqli_connect("localhost", "root", "mysql", "lib");

include("logwork.php");
include("checkses.php");
if(!isset($_SESSION['search'])){
    header("Location:index.php");
}else{

$connection = mysqli_connect("localhost", "root", "mysql", "lib");
$ss=$_SESSION['search'];



$search=mysqli_query($connection,"$ss");


if($search and mysqli_num_rows($search)<1){
    $nores='<h1 style="color:white;font-family:Arial;margin-left:18%">No Result Found</h1>';
}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
</head>
<style>
/* Head */
.head{
 font-weight:700;
 font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;
 font-size:19px;
 margin-left:5%;
 color:#ffffff;
 margin-top: 0;
 margin-bottom: 0;
}


.head1{
 font-weight:700;
 font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;
 font-size:19px;
 margin-left:5%;
 margin-top: 0;
 padding-top: 19px;
}
/* Heading */
 h1{
 font-size:27px;
 margin-top:1px;
 margin-bottom:1px;
}

/* Heading */
 h2{
 margin-top:4px;
 margin-bottom:4px;
}

/* Result */
 .result{
 width:100% !important;
 background-color:#a2d7ca;
 padding-left:10%;
}

.back{
color: white;

}
.shead{background-color:#025859; }
</style>



<body>
<div style="width: 100%; background-color:#025859">
<p class="head">
<a href="index.php" class="back" >Go back</a></p>
</div>
<table width="100%">
<?php

include("header.php");

?>

</table>
<hr style="color:black" >
<div class="shead">
<p class="head1">Search results(<?php echo mysqli_num_rows($search) ?>)</p>
<br></div>
<?php echo $nores; ?>
<table width="100%">
    <tr>
        <th>Bookid</th>
        <th>Title</th>
        <th>Author</th>
        <th>Type</th>
        <th>Category</th>
        <th>Classification</th>
        <th>Course</th>
        <th>Department</th>
        <th>Year of publication</th>
        <th>Description</th>



    </tr>
<?php while($getdata3=mysqli_fetch_array($search)){ ?>

    <tr class="result">
        <td>
        <?php  echo $getdata3['contentid'] ?>

        </td>
<td><?php  echo $getdata3['title'] ?></td>
<td><?php  echo $getdata3['author'] ?></td>





<td><?php $typeid=$getdata3['typeid'];
$gettype=mysqli_query($connection,"select * from lib.restype where typeid='$typeid'");
$type=mysqli_fetch_assoc($gettype); echo $type['type'];
?></td>

<td><?php $catid=$getdata3['catid'];
$getcat=mysqli_query($connection,"select * from lib.cate where catid='$catid'");
$cat=mysqli_fetch_assoc($getcat); echo $cat['category'];
?></td>


<td><?php $classid=$getdata3['classid'];
$getclass=mysqli_query($connection,"select * from lib.class where classid='$classid'");
$class=mysqli_fetch_assoc($getclass); echo $class['class'];
?></td>


<td><?php $courseid=$getdata3['courseid'];
$getcourse=mysqli_query($connection,"select * from lib.courses where courseid='$courseid'");
$course=mysqli_fetch_assoc($getcourse); echo $course['coursename'];
?></td>

<td><?php $deptid=$getdata3['deptid'];
$getdep=mysqli_query($connection,"select * from lib.dept where deptid='$deptid'");
$dept=mysqli_fetch_assoc($getdep); echo $dept['deptname'];
?></td>


<td><?php  echo $getdata3['yearofpub'] ?></td>


<td><?php  echo $getdata3['description'] ?></td>
<td>
<?php
if(isset($_SESSION['user'])){
$cid=$getdata3["contentid"]; $reqm='<a class="view" href="req.php?rssn='.$cid.'"'.">Request</a>"

;}



if(!isset($_SESSION['user'])){
$reqm='<a class="view" href="log.php">Request</a>
';  
}
echo $reqm; ?>
</td>

</tr>
<?php }?>
</table>






    
</body>
</html>