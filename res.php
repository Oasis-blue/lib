<?php


session_start();
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

/* Body */
body{
 background-color:#080f2f;
 margin-left:0px;
 margin-right:0px;
 margin-top:0px;
 margin-bottom:0px;
}

/* List */
ul{
 width:100% !important;
 padding-left:0px;
}


/* Link */
.head a{
 text-decoration:underline;
 color:#00f4e8;
 font-weight:500;
 font-size:16px;
}

/* Link (hover) */
.head a:hover{
 color:#c7f400;
}
/* Link */
.result li a{
 position:relative;
 left:18%;
 font-size:1em;
 font-family:'Arial Black','Arial Bold',Gadget,sans-serif;
 color:#1c870c;
}

.result li a:hover{color:#c7f400}



</style>



<body>
<p class="head">
<a href="index.php" class="back">Go back</a></p>
<p class="head">Search results(<?php echo mysqli_num_rows($search) ?>)</p>
<br>
<?php echo $nores; ?>
<ul>
<?php while($getdata3=mysqli_fetch_array($search)){ ?>

    <div class="result"><li>
<h1>Title:<?php  echo $getdata3['title'] ?></h1>
<h2>Author:<?php  echo $getdata3['author'] ?></h2>
<p>Description:<?php  echo $getdata3['description'] ?></p>

<p>Type:<?php $typeid=$getdata3['typeid'];
$gettype=mysqli_query($connection,"select * from lib.restype where typeid='$typeid'");
$type=mysqli_fetch_assoc($gettype); echo $type['type'];
?></p>
<a class="view" href="upload\<?php  echo $getdata3['link'] ?>">View</a>
</li>  </div>
<?php }?>
</ul>






    
</body>
</html>