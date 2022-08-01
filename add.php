<?php


session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}
include("exfix.php");
include("checkses.php");
$bottom2="";

// connect to the database
include("connection.php");
// Uploads files
if (isset($_POST['add'])) { // if add button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

  
        $title=$_POST['title'];
$author=$_POST['author'];
$courseid=$_POST['course'];
$facid=$_POST['fac'];
$tag1=$_POST['tag1'];
$tag2=$_POST['tag2'];
$tag3=$_POST['tag3'];
$matinfo=$_POST['matinfo'];
$deptid=$_POST['dep'];
$typeid=$_POST['type'];
$yearofpub=$_POST['year'];
$description=$_POST['des'];
$class=$_POST['class'];
$cate=$_POST['cat'];
$copies=$_POST['copies'];
$dateofup=date("d-M-Y");

if($matinfo=="softcopy"){
        if($filename==""){
            $succe="<span style='color:red'>Please provide the file you are uploading</span>";
        }}
    if($matinfo=="hardcopy"){
        if($copies==""){
            $succe="<span style='color:red'>Please provide the number of copies</span>";
        }
    }
    

if(isset($succe)){}else{


    // destination of the file on the server
    $destination = 'upload/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
/*
    if (!in_array($extension, array(['zip', 'pdf', 'docx', 'epub', 'mp4','jpg','jpeg','png']))) {
        echo "You file extension must be .zip,.epup,.mp4,.jpg, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {*/
        // move the uploaded (temporary) file to the specified destination
        move_uploaded_file($file, $destination);
        //if (move_uploaded_file($file, $destination)) {



$checkauthor=mysqli_query($connection,"select * from lib.authors where author='$author'");
if(mysqli_num_rows($checkauthor)>0){
    $r=mysqli_fetch_assoc($checkauthor);
    $authid=$r['authid'];
}



if(mysqli_num_rows($checkauthor)<1){

$sendauth=mysqli_query($connection, "INSERT INTO lib.authors (author) values('$author')");
if($sendauth==1){
$checkauthor2=mysqli_query($connection,"select * from lib.authors where author='$author'");
}

    $r2=mysqli_fetch_assoc($checkauthor2);
    $authid=$r2['authid'];
}








            $tags=$tag1." ".$tag2." ".$tag3;
if($tag1==$tag2){
    $tags=$tag1." ".$tag3;
}
if($tag2==$tag3){
    $tags=$tag2." ".$tag1;
}

if($tag1==$tag3){
    $tags=$tag1." ".$tag2;
}
if($tag1==$tag3 && $tag1==$tag2){
    $tags="$tag1";
}
//$seekdoub=mysqli_query($connection, "select ")


            $sql = "INSERT INTO lib.content (title, author, authid, courseid, facid, deptid, typeid, tags, description, yearofpub, link, classid, catid, copies, matinfo, uploaddate) 
            VALUES ('$title','$author','$authid','$courseid','$facid','$deptid','$typeid','$tags','$description','$yearofpub','$filename','$class','$cate','$copies', '$matinfo', '$dateofup')";
            $res=mysqli_query($connection, $sql);
            if ($res==1) {
$checktag1=mysqli_query($conn,"select * from keywords where tag='$tag1'");
if(mysqli_num_rows($checktag1)<1){

                $sqll=mysqli_query($conn,"insert into lib.keywords (tag) values ('$tag1')");}

                $checktag2=mysqli_query($conn,"select * from keywords where tag='$tag2'");
                if(mysqli_num_rows($checktag2)<1){
                $sqlll=mysqli_query($conn,"insert into lib.keywords (tag) values ('$tag2')");}

                $checktag3=mysqli_query($conn,"select * from keywords where tag='$tag3'");
if(mysqli_num_rows($checktag3)<1){
                $sqlll=mysqli_query($conn,"insert into lib.keywords (tag) values ('$tag3')");}
                $succ="<span style='color:green'>File uploaded successfully</span>";
            }
     //   } else {
            //echo "Failed to upload file.";
            
        }
  }
//}















?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a book</title>
</head><?php
include("resolu.php");


?>
<style>
/* Division */
.hl{
 display:grid;
 flex-direction:row;
 flex-wrap:wrap;
 justify-content:center;
 background-color:rgba(239,239,239,0.87);
 grid-template-rows:auto 1fr !important;
 width:46%;
 position:relative;
 left:400px;
 box-shadow:0px 0px 27px 0px rgba(0,0,0,0.38);
}

/* Input */
.hl form input[type=file]{
 font-size:16px;
}

/* Form Division */
.hl form{
 padding-top:13px;
 padding-bottom:14px;
 display:flex;
 flex-direction:column;
 width:543px;
}

/* Title */
#title{
 font-size:18px;
 padding-left:2px;
 padding-top:6px;
 padding-bottom:6px;
}

/* Type */
#type{
 padding-top:6px;
 padding-bottom:6px;
 font-size:18px;
}

/* Select */
.hl select{
 font-size:18px;
 padding-top:6px;
 padding-bottom:6px;
}

/* Input */
.hl input{
 font-size:18px !important;
 padding-top:6px;
 padding-bottom:6px;
}

/* Des */
#des{
 font-size:18px;
 padding-top:6px;
 padding-bottom:6px;
}

@media (max-width:1146px){

/* Division */
.hl{
 width:615px;
 left:285px;
}

}

@media (max-width:1035px){

/* Division */
.hl{
 left:241px;
}

}

@media (max-width:966px){

/* Division */
.hl{
 left:0px;
}

}

@media (max-width:964px){

/* Division */
.hl{
 align-content:center;
 width:100%;
}

}

@media (max-width:640px){

/* Division */
.hl{
 width:97%;
}

}

@media (max-width:592px){

/* Select */
.hl form select{
 width:68% !important;
 align-self:center;
}

/* Input */
.hl input{
 width:71% !important;
 align-self:center;
}

/* Des */
#des{
 width:76% !important;
 align-self:center;
}

/* Label */
.hl form label{
 width:73% !important;
 align-self:center;
}

/* Division */
.hl{
 width:100%;
}

}

@media (max-width:421px){

/* Division */
.hl{
 transform:translatex(0px) translatey(0px);
}

/* Des */
#des{
 width:60% !important;
}

/* Label */
.hl form label{
 width:62% !important;
}

/* Select */
.hl form select{
 width:60% !important;
}

/* Input */
.hl form input[type=file]{
 width:57% !important;
}

/* Input */
.hl form input{
 width:60% !important;
}

}

@media (max-width:415px){

/* New created breakpoint. */

}

@media (max-width:361px){

/* Select */
.hl form select{
 width:41% !important;
}

/* Label */
.hl form label{
 width:41% !important;
}

/* Year */
#year{
 width:43% !important;
}

/* Author */
#author{
 width:43% !important;
}

/* Title */
#title{
 width:43% !important;
}

/* Des */
#des{
 width:43% !important;
}

/* Copies */
#copies{
 width:43% !important;
}

/* Input */
.hl form input[type=text]{
 width:43% !important;
}

/* Input */
.hl form input{
 width:43% !important;
}

}

@media (max-width:272px){

/* Input */
.hl form input[type=file]{
 width:40% !important;
}

}

</style>
<body>
<table width="100%" class="tabbb">
<?php

include("header.php");

?>

</table>  
<hr>

<br>
<div class="colo">
<br>
<center>
<a href="index.php" >GO TO HOMEPAGE</a>
<?php echo "<br>".($succ ?? "")  ?>
<?php echo "<br>".($succe ?? "")  ?>
</center>
<br> </div>
<br>
<div class="hl">
<form method="POST" enctype="multipart/form-data">

<input type="file" name="myfile"><br>

<select name="matinfo">






<option value="hardcopy">Hard Copy</option>

<option value="softcopy">Soft Copy</option>


</select><br>
<label for="type">Type:</label>
<select name="type" id="type">
<?php $select=mysqli_query($connection, "SELECT * FROM lib.restype");
while($gettype=mysqli_fetch_array($select)){
?>

<option value="<?php echo $gettype['typeid']; ?>"><?php  echo $gettype['type'] ?></option>

<?php } ?>
</select>
<br>
<label for="title">Title:</label>
<input type="text" id="title" name="title" placeholder="enter the title of the document/resource" required value="<?php if(isset($succe)){
    echo $title;
} ?>">
<br>
<label for="author">Author:</label>
<input type="text" id="author" name="author" placeholder="enter the name of author(s) or patents of the document/resource" list="authors" value="<?php if(isset($succe)){
    echo $author;
} ?>">

<datalist id="authors">
    <?php
$selecttrr=mysqli_query($connection, "SELECT * FROM lib.authors");
while($trr=mysqli_fetch_array($selecttrr)){
?>
<option value="<?php echo $trr["author"]; ?>">
<?php
}
?>

</datalist>

<br>

<label for="year">Year of Publicaction:</label>

<input type="number" id="year" name="year" placeholder="enter year of publication" value="<?php if(isset($succe)){
    echo $yearofpub;
} ?>">
<br>

<!--Note to self, Add upload date whe editting again-->

<label for="des">Description</label>
<textarea name="des" id="des" placeholder="document description"></textarea>

<br>
<label for="fac">Faculty:</label><select name="fac" id="fac">


<?php
 $selectfac=mysqli_query($connection, "SELECT * FROM lib.faculty");
while($getfac=mysqli_fetch_array($selectfac)){ ?>
    <option value="<?php echo $getfac["facid"]; ?>"><?php echo $getfac["faculty"]; ?></option>
   
    <?php } ?>
</select>
<br>

<label for="dep">Department:</label><select name="dep" id="dep">


<?php
 $selectdep=mysqli_query($connection, "SELECT * FROM lib.dept");
while($getdep=mysqli_fetch_array($selectdep)){ ?>
    <option value="<?php echo $getdep["deptid"]; ?>"><?php echo $getdep["deptname"]; ?></option>
   
    <?php } ?>
</select>



<br>


<label for="course">Course:</label><select name="course" id="course">




<?php 
 $selectc=mysqli_query($connection, "SELECT * FROM lib.courses");
while($cour=mysqli_fetch_array($selectc)){ ?>
<option value="<?php echo $cour["courseid"]; ?>"><?php echo $cour["coursename"]; ?></option>
<?php }?>



</select>



<br>


<label for="class">Classification:</label><select name="class" id="class">




<?php 
 $selectcl=mysqli_query($connection, "SELECT * FROM lib.class");
while($cla=mysqli_fetch_array($selectcl)){ ?>
<option value="<?php echo $cla["classid"]; ?>"><?php echo $cla["class"]; ?></option>
<?php }?>



</select>


<br>


<label for="cat">Category:</label><select name="cat" id="cat">




<?php 
 $selectcat=mysqli_query($connection, "SELECT * FROM lib.cate");
while($cat=mysqli_fetch_array($selectcat)){ ?>
<option value="<?php echo $cat["catid"]; ?>"><?php echo $cat["category"]; ?></option>
<?php }?>



</select>

<label for="copies">No of Copies:</label>
<input type="number" id="copies" name="copies" />


<br>
<label for="tag1">Tag 1(optional):</label>
<input type="text" id="tag1" name="tag1" list="tags" />
<datalist id="tags">
    <?php
$selectt=mysqli_query($connection, "SELECT * FROM lib.keywords");
while($t=mysqli_fetch_array($selectt)){
?>
<option value="<?php echo $t["tag"]; ?>">
<?php
}
?>

</datalist>


<br>
<label for="tag2">Tag 2(optional):</label>
<input type="text" id="tag2" name="tag2" list="tags" />
<datalist id="tags">
    <?php
$selectt=mysqli_query($connection, "SELECT * FROM lib.keywords");
while($t=mysqli_fetch_array($selectt)){
?>
<option value="<?php echo $t["tag"]; ?>">
<?php
}
?>

</datalist>

<br>
<label for="tag3">Tag 3(optional):</label>
<input type="text" id="tag3" name="tag3" list="tags" />
<datalist id="tags">
    <?php
$selectt=mysqli_query($connection, "SELECT * FROM lib.keywords");
while($t=mysqli_fetch_array($selectt)){
?>
<option value="<?php echo $t["tag"]; ?>">
<?php
}
?>

</datalist>
<br>

<input type="submit" name="add" value="add">
</form>
<br><br><br><br><br><br>
</div>

<div style="min-height: 40vh ;"></div>
</body>
</html>





