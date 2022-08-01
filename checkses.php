<?php

include("exfix.php");
include("connection.php");
if(!isset($_SESSION['admin'])){
  $getlibcard=' <li class="item button secondary"><a href="signup.php" class="navlink">REGISTER</a></li>';
    $adlog='         <li class="item button">
    
    
    <div class="dropdown3">
    
    
    
    <a class="navlink"><button onclick="myFunctionn()" class="dropbtn3">ADMIN</button></a>
    
    <div id="myDropdown3" class="dropdown-content3">
      <form method="POST">
        <label for="id3">Admin ID.:<br></label><input type="number" name="adid" id="id3" class="id3" placeholder="Enter your ID" required >
        <br>
        <br>
        <label for="pass3">Key:<br></label><input type="password" name="key" id="pass3" class="pass3" placeholder="Enter your key" required >
        <br>
        <br>
        <input type="submit" name="loginad" class="login3" value="Login">
    
    
      </form>
    </div>
    </div>
    
    
    
    </li>
    ';
    
    }
    
    
    
    if(!isset($_SESSION['user'])){
      $getlibcard=' <li class="item button secondary"><a href="signup.php" class="navlink">REGISTER</a></li>';
    $userlog='
    <li class="item button">
    
    
   
    
    
    
    <a class="navlink" href="log.php"><button class="dropbtn">USER LOGIN</button></a>
    
    
    
    
    </li>
    
    ';
    }
    
    if(isset($_SESSION['admin'])){
        $vie='<li class="item"><a class="navlink" href="viewreq.php">REQUESTS</a></li>';
    $logout='<li class="item"><a class="navlink"  href="logout.php">LOG OUT</a></li>';
    $bottom2='<a class="flink" href="add.php">Add a book</a>';
    $bottom22='<a class="flink" href="reqhist.php">Request History</a>';
    $bottom3='<a class="flink" href="ret.php">Return a book</a>';
    $bottom7='<a class="flink" href="viewusers.php">View Users</a>';
    $checksub=mysqli_query($connection, "select * from lib.sugg");
    if(mysqli_num_rows($checksub)>0){
    
      $counn=mysqli_num_rows($checksub);}



    $bottom4='<a class="flink" href="suggs.php">Suggestions('.$counn.')</a>';

    $goc=mysqli_query($connection,"select * from lib.requests where approval_status='pending'");
    $gofc=mysqli_query($connection,"select * from lib.reqdown where access!='granted'");
    $count=mysqli_num_rows($goc);
    $countvc=mysqli_num_rows($goc)+mysqli_num_rows($gofc);
    $bottom1='<a class="flink" href="viewreq.php?sts=pending">View pending requests('.$countvc.')</a>';

    $reqm='<a class="view" target="_blank" href='.'upload'."\"".($getdata3['link'] ?? "")." >View</a>";
$userlog="";
$getlibcard="";



$checknot=mysqli_query($connection, "select * from lib.notreqs");
if(mysqli_num_rows($checknot)>0){
  
  while($cc=mysqli_fetch_assoc($checknot)){

$ccc=$cc["bookid"];
$cccc=mysqli_query($connection,"select * from lib.content where contentid='$ccc' and copies>0");
if(mysqli_num_rows($cccc)>0){
$c[]=mysqli_num_rows($cccc);
}

  }

$coun=count($c);
  $notif='<a class="flink" href="nores.php">Notifications('.$coun.')</a>';}



    }else{

      $getlibcard=' <li class="item"><a href="signup.php" class="navlink">REGISTER</a></li>';
    }
    
    if(isset($_SESSION['user'])){$adlog="";
      $logout='<li class="item"><a class="navlink"  href="logout.php">LOG OUT</a></li>';
      $getlibcard="";
      //$reqm="";
      $user=$_SESSION['user'];
      $goc=mysqli_query($connection,"select * from lib.requests where requesterid='$user'");
      $count=mysqli_num_rows($goc);
      $bottom1='<a class="flink" href="viewreqq.php">My requests('.$count.')</a>';
     
$reqq='  <li class="item"><a href="sugg.php" class="navlink">REQUEST AN ADDITION</a></li>';

$checknot=mysqli_query($connection, "select * from lib.notreqs where userid='$user'");
if(mysqli_num_rows($checknot)>0){
  
  while($cc=mysqli_fetch_assoc($checknot)){

$ccc=$cc["bookid"];
$cccc=mysqli_query($connection,"select * from lib.content where contentid='$ccc' and copies>0");
if(mysqli_num_rows($cccc)>0){
$c[]=mysqli_num_rows($cccc);
}

  }

$coun=count($c);



  $notif='<a class="flink" href="noti.php">Notifications('.$coun.')</a>';
}



      }else{

  

  $reqm='<a class="view" href="log.php">Request</a>
';  
      }
      if(isset($_SESSION['search'])){
$gob='<a href="res.php">Go back to search results</a>';
      }else{
      $gob=  '<a href="index.php">Go back</a>';

      }

     


?>