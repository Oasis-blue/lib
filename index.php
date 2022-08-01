<?php
session_start();

include("exfix.php");
include("connection.php");
include("logwork.php");

include("checkses.php");
unset($_SESSION["jskd"]);
$selectfac = mysqli_query($connection, "SELECT * FROM lib.faculty");
$selectdep = mysqli_query($connection, "SELECT * FROM lib.dept");






if(isset($_POST['seek'])){



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
    $year = "and yearofpub='$yearr'";
  }



  $search = "select * from lib.content where $by like '$needle' $fac $dep $year ";

if( $fac == ""){
 $ffff="All faculties";
}else{
  
$ff= mysqli_query($connection, "SELECT * FROM lib.faculty where facid='$facc'");
$fff=mysqli_fetch_assoc($ff);
$ffff=$fff["faculty"];

}



if( $dep == ""){
  $dddd="All departments";
}else{
  
  $dd= mysqli_query($connection, "SELECT * FROM lib.dept where deptid='$depp'");
  $ddd=mysqli_fetch_assoc($dd);
 $dddd=$ddd["deptname"];
  
  }





if( $year != ""){
  $yearrr="$yearr";
}
$_SESSION['dd']=$dddd;
$_SESSION['yy']=$yearrr;
  $_SESSION['rch'] = $by;
  $_SESSION['sech'] = $_POST['needle'];
  $_SESSION['ff']=$ffff;
  $_SESSION['search'] = $search;


  header("Location:res.php");
}


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gr8tson tech</title>
  <?php

include("resolution.php");

?>
</head>
<style>

/* Division */
body div:nth-child(5){
 display:flex;
 flex-direction:column;
 justify-content:center;
 align-items:center;
 flex-wrap:wrap;

  
 min-height: 93vh;
}


@media (max-width:997px){

/* Image */
div img{
 width:90vw;
}

}
/* Select */
select{
 border-style:none;
}

/* Input */
.se td input[type=text]{
 border-width:0px;
 border-bottom-style:none;
 border-right-style:none;
}


@media (max-width:640px){

/* Division */
body div:nth-child(5){
 min-height:5px !important;
 height:50vh;
}

}

@media (max-width:372px){

/* Division */
body div:nth-child(5){
 min-height:3px !important;
 height:30vh;
}

}
.mySlides {display: none;}
img {vertical-align: middle;}
/* Image */
.slideshow-container .mySlides img{
 max-height:90vh;
}

@media (min-width:998px){

 /* Image */
 .slideshow-container .mySlides img{
  width:90% !important;
 }
 
}
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>


<body>

  <table width="100%" class="tabb">


  <?php  include("header.php"); ?>
    <!---->
<div>



<div class="slideshow-container">

<div class="mySlides fade">
  
  <img alt="elib" src="phh.png" >
 
</div>

<div class="mySlides fade">
 
  <img src="132.jpg" class="onepic" >
  <div class="text">Study and Research with ease.</div>
</div>

<div class="mySlides fade">
  
  <img src="123.jpg" class="twopic" >
  <div class="text">Browse through our wholesome collection of hard copy and soft copy materials</div>
</div>
<div class="mySlides fade">
  
  <img src="1444.png" class="threepic"  >
  <div class="text" style="color: black;">Can't find a book in our collection? Suggest it to be added to our shelf</div>
</div>
<div class="mySlides fade">
  
  <img src="234.png" class="four" >
  <div class="text" style="color: black;"><span style="background-color: yellow;">Take your Library where ever you go</span></div>
</div>
</div></div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 5 seconds
}
</script>



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