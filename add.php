<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', 'mysql', 'lib');
$connection = mysqli_connect('localhost', 'root', 'mysql', 'lib');
// Uploads files
if ($_POST['add']!="") { // if add button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

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
$title=$_POST['title'];
$author=$_POST['author'];
$courseid=$_POST['course'];
$facid=$_POST['fac'];
$tag1=$_POST['tag1'];
$tag2=$_POST['tag2'];
$tag3=$_POST['tag3'];

$deptid=$_POST['dep'];
$typeid=$_POST['type'];
$yearofpub=$_POST['year'];
$description=$_POST['des'];
$class=$_POST['class'];
$cate=$_POST['cat'];
$copies=$_POST['copies'];


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


            $sql = "INSERT INTO lib.content (title, author, courseid, facid, deptid, typeid, tags, description, yearofpub, link, classid, catid, copies) 
            VALUES ('$title','$author','$courseid','$facid','$deptid','$typeid','$tags','$description','$yearofpub','$filename','$class','$cate','$copies')";
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
                echo "File uploaded successfully";
            }
     //   } else {
            //echo "Failed to upload file.";
            
        }
   // }
//}















?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

/* Body */
body{
 background-color:#017373;
 font-size:2em;
 font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;
 color:#ffffff;
}

/* Type */
#type{
 font-size:21px;
}

/* Input */
input{
 font-size:20px;
}

/* Form Division */
form{
 display:flex;
 grid-template-columns:auto;
 grid-template-rows:auto !important;
 flex-direction:column;
 justify-content:normal;
 align-items:normal;
 width:34% !important;
 transform:translatex(0px) translatey(0px);
 position:relative;
 left:35vw;
 margin-bottom:116px;
}

/* Input */
form input[type=submit]{
 width:42% !important;
 align-self:center;
 cursor:pointer;
}

/* Label */
form label{
 font-size:18px;
}

/* Dep */
#dep{
 font-size:21px;
}

/* Select */
select{
 font-size:21px;
}

/* Des */
#des{
 font-size:21px;
}

/* Input */
form input[type=file]{
 margin-top:36px;
}




</style>


<body>
    
<form method="POST" enctype="multipart/form-data">

<input type="file" name="myfile"><br>

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
<input type="text" id="title" name="title" placeholder="enter the title of the document/resource">
<br>
<label for="author">Author:</label>
<input type="text" id="author" name="author" placeholder="enter the name of author(s) or patents of the document/resource">
<br>

<label for="year">Year of Publicaction:</label>

<input type="number" id="year" name="year" placeholder="enter year of publication">
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


</body>
</html>





