<?php
session_start();

$connection = mysqli_connect("localhost", "root", "mysql", "lib");











$selectfac=mysqli_query($connection, "SELECT * FROM lib.faculty");
$selectdep=mysqli_query($connection, "SELECT * FROM lib.dept");










if($_POST['seek']!=""){


    
    
        $byy=$_POST['by'];
        $needle="%".$_POST['needle']."%";
    
        $by= $byy ;
       
   


    $by=$_POST['by'];
if($_POST['fac']==""){
    $fac="";
}else{
    $facc=$_POST['fac'];
    $fac="and facid='$facc'";
}
if($_POST['dep']==""){
    $dep="";
}else{
    $depp=$_POST['dep'];
    $dep="and deptid='$depp'";
}
if($_POST['year']==""){
    $year="";
}else{
    $yearr=$_POST['year'];
    $year="and year='$yearr'";
}



$search="select * from lib.content where $by like '$needle' $fac $dep $year ";


    $_SESSION['search']=$search;


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
<style>
    body{margin: 0;
   }
.tabb{height: 130vh;}
.one{background-color: grey;}
.two{background-color: white;}
.se{
color: white;
}


.bod{
background-image: url("ph.jpg");
background-size: cover;

}
/*
.bod{background-color: lightslategrey;}*/

/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=TimesNewRoman:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Flink */
.flink{
 text-decoration:none;
 color:#ffffff;
 font-family: 'TimesNewRoman';
 font-size:1em;
 margin: 0 1rem;
}

/* Division */
.one td .up{
 display: flex;
 justify-content:center;
align-items: center;


}



/* Flink (hover) */
.flink:hover{
 opacity:0.75;
 color:#19ebdd;
}
.logo{ width:233px;}
a{text-decoration: none;}

nav{
display: flex;
justify-content: space-between;
align-items: center;
}

nav ul{
    display: flex;
    list-style-type: none;
}
nav ul li{
    margin: 0 1rem;
}

.navlink{

font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
color: black;
}

.navlink:hover{background-color: black; color: white;} 


.sear{
display: flex;
justify-content: center;
align-items: center;
}


/* Searchbox */
.searchbox{
 height:27px;
 font-size:16px;
 margin-left:11px;
}

/* Input */
.tabb tbody .se td .sear input[type=text]{
 width:30% !important;
}

/* SearchUnknown */
.searchselect{
 height:33px;
 width:5% !important;
 font-size:16px;
}

/* Label */
.se td label{
 font-family:'Trebuchet MS','Lucida Grande','Lucida Sans Unicode','Lucida Sans',Tahoma,sans-serif;
 margin-left:19px;
}

/* Searchbtn */
.se td .searchbtn{
 background-color:#f3fd29;
 border-style:none;
 height:31px;
 cursor: pointer;
}
.se td .searchbtn:hover{
 background-color:#6df41a;
}

/* Table Row */
.se{
 background-color:#025859;
}















/* Dropdown Button */


/* The container <div> - needed to position the dropdown content */
.dropdown {
   position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
 .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
 .dropdown-content a {
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
   display: block;
}

/* Change color of dropdown links on hover */
 .dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .navlink {background-color: black; color: white;} 

/* Import Google Fonts */
@import url("//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap");

/* Paragraph */
.qu{
 text-align:center;
 font-family:'Playfair Display', serif;
 font-size:19px;
 margin-top:0px;
 margin-bottom:-14px;
}
.dropdown2 {
  position: relative;
  display: inline-block;
}
.dropdown-content2 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 230px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropbtn {
  background:none;
  color: white;
  padding: 16px;
  font-size: 16px;
   border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}
.show {display:flex;} 

/* Dropdown content2 */
.dropdown-content2{
 min-height:283px;

 justify-content:center;
 font-size:1em;
 font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;
 font-weight:600;
}

/* Input */
#id{
 height:2em;
 font-size:1em;
}

/* Pass */
#pass{
 font-size:1em;
 height:2em;
}

/* Form Division */
.dropdown2 form{
 height:189px;
 position:relative;
 top:2em;
}

.login{

    cursor: pointer;
}

/* Login */
.dropdown2 form .login{
 width:100%;
 height:2em;
 background-color:#018192;
 color:#ffffff;
 border-style:none;
}

/* Login (hover) */
.dropdown2 form .login:hover{
 background-color:#03d0ec;
}









</style>
<script>
function myFunction() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
 window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
document.getElementById("myDropdown2").onclick= function(events){

document.getElementById("myDropdown2").classList.toggle("show");

}
</script>

<body>
    <table width="100%" class="tabb">

        
<!---->
<tr height="5%" class="one"><td >

<div class="up">
            <a class="flink" href="">HELP</a>

            <div class="dropdown2">
          
          
          
            <a class="flink"  ><button onclick="myFunction()" class="dropbtn"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M7.35,18.5C8.66,17.56,10.26,17,12,17 s3.34,0.56,4.65,1.5C15.34,19.44,13.74,20,12,20S8.66,19.44,7.35,18.5z M18.14,17.12L18.14,17.12C16.45,15.8,14.32,15,12,15 s-4.45,0.8-6.14,2.12l0,0C4.7,15.73,4,13.95,4,12c0-4.42,3.58-8,8-8s8,3.58,8,8C20,13.95,19.3,15.73,18.14,17.12z"/><path d="M12,6c-1.93,0-3.5,1.57-3.5,3.5S10.07,13,12,13s3.5-1.57,3.5-3.5S13.93,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 S11.17,8,12,8s1.5,0.67,1.5,1.5S12.83,11,12,11z"/></g></g></svg></button></a>

            <div id="myDropdown2" class="dropdown-content2">
    <form method="POST">
<label for="id">Library card no.:<br></label><input type="number" name="id" id="id" class="id" placeholder="Enter your library number">
<br>
<br>
<label for="pass">PIN:<br></label><input type="password" name="pass" id="pass" class="pass" placeholder="Enter your pin">
<br>
<br>
<input type="submit" name="login" class="login" value="Login">


    </form>
            </div></div>


        </div>

</td></tr>



<tr height="10%" class="two" ><td>
    <nav>
<img class="logo" src="logoo.png">
<ul>
<li><a href="" class="navlink">GET A LIBRARY CARD</a></li>


<li>
   
<div class="dropdown">
<a href="" class="navlink">BOOKS</a>
  <div class="dropdown-content"> 
  <a href="">TEXTBOOKS</a>
  <a href="">AUDIOBOOKS</a>
  <a href="">HAND-OUTS</a>
  <a href="">LITERATURE</a>
  <a href="">ENCYCLOPEDIA</a>
  <a href="">ALL BOOKS</a>
  </div>
</div>


</li>
<li><a href="" class="navlink">VIDEOS</a></li>

<li><a href="" class="navlink">AUTHORS</a></li>



<li>

<div class="dropdown">
  <a href="" class="navlink">OTHER RESOURCES</a>
  <div class="dropdown-content">
    <a href="">ARTICLES/JOURNALS</a>
    <a href="">ONGOING RESEARCH</a>
    <a href="">NEWSPAPERS/MAGAZINES</a>
    <a href="">PHOTO LIBRARY</a>
    <a href="">PAST QUESTIONS</a>
    <a href="">OTHER PUBLICATIONS</a>
  </div>
</div>


</li>
<li><a href="" class="navlink">REQUEST A BOOK</a></li>
</ul>

    </nav>

</td>

</tr>

<tr height="10%" class="se" ><td >
<p class="qu">Looking for something?</p>    
<br><form method="POST">
<div class="sear">

<label for="by">Search by:</label><select name="by" id="by" class="searchselect">

<option value="title">Title</option>
    <option value="tags">Keyword</option>
    <option value="author">Author</option>
    
</select>




<label for="fac">Faculty:</label><select name="fac" id="fac" class="searchselect">

<option value="">All faculties</option>
<?php while($getfac=mysqli_fetch_array($selectfac)){ ?>
    <option value="<?php echo $getfac["facid"]; ?>"><?php echo $getfac["faculty"]; ?></option>
   
    <?php } ?>
</select>

<label for="dep">Department:</label><select name="dep" id="dep" class="searchselect">

<option value="">All departments</option>
   
<?php while($getdep=mysqli_fetch_array($selectdep)){ ?>
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
<button type="submit" value="go" class="searchbtn" name="seek"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>

</div></form>
</td></tr>

<tr height="75%" class="bod" ><td ></td></tr>


    </table>












</body>
</html>