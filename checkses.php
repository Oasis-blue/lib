<?php


$connection = mysqli_connect("localhost", "root", "mysql", "lib");
if(!isset($_SESSION['admin'])){

    $adlog='         <li>
    
    
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
    
    $userlog='
    <li>
    
    
    <div class="dropdown2">
    
    
    
    <a class="navlink"><button onclick="myFunction()" class="dropbtn">LOGIN</button></a>
    
    <div id="myDropdown2" class="dropdown-content2">
    <form method="POST">
    <label for="id">Library card no.:<br></label><input type="text" name="id" id="id" class="id" placeholder="Enter your library number" required >
    <br>
    <br>
    <label for="pass">Password:<br></label><input type="password" name="pass" id="pass" class="pass" placeholder="Enter your pin" required >
    <br>
    <br>
    <input type="submit" name="login" class="login" value="Login">
    
    
    </form>
    </div>
    </div>
    
    
    
    </li>
    
    ';
    }
    
    if(isset($_SESSION['admin'])){
        $vie='<a class="navlink" href="viewreq.php">REQUESTS</a>';
    $logout='<a class="flink"  href="logout.php">LOG OUT</a>';
    $bottom2='<a class="flink" href="add.php">Add a book</a>';
    $bottom3='<a class="flink" href="ret.php">Return a book</a>';

    $bottom4='<a class="flink" href="suggs.php">Suggestions</a>';

    $goc=mysqli_query($connection,"select * from lib.requests where approval_status='pending'");
    $count=mysqli_num_rows($goc);
    $bottom1='<a class="flink" href="viewreq.php?sts=pending">View pending requests('.$count.')</a>';

    $reqm='<a class="view" href="upload\ '.$getdata3['link'].' target="_blank">View</a>';
$userlog="";
$getlibcard="";



$checknot=mysqli_query($connection, "select * from lib.notreqs");
if(mysqli_num_rows($checknot)>0){

  $coun=mysqli_num_rows($checknot);
  $notif='<a class="flink" href="nores.php">Notifications('.$coun.')</a>';}



    }else{

      $getlibcard=' <li><a href="signup.php" class="navlink">REGISTER</a></li>';
    }
    
    if(isset($_SESSION['user'])){$adlog="";
      $logout='<a class="flink"  href="logout.php">LOG OUT</a>';
      $getlibcard="";
      //$reqm="";
      $user=$_SESSION['user'];
      $goc=mysqli_query($connection,"select * from lib.requests where requesterid='$user'");
      $count=mysqli_num_rows($goc);
      $bottom1='<a class="flink" href="viewreqq.php">My requests('.$count.')</a>';
     
$reqq='  <li><a href="sugg.php" class="navlink">REQUEST AN ADDITION</a></li>';

$checknot=mysqli_query($connection, "select * from lib.notreqs where userid='$user'");
if(mysqli_num_rows($checknot)>0){
  
  while($cc=mysqli_fetch_array($checknot)){

$ccc=$cc["bookid"];
$cccc=mysqli_query($connection,"select * from lib.content where contentid='$ccc' and copies>0");
$c[]=mysqli_num_rows($cccc);


  }

$coun=count($c);



  $notif='<a class="flink" href="noti.php">Notifications('.$coun.')</a>';
}



      }else{

  

  $reqm='<a class="view" href="log.php">Request</a>
';   $getlibcard=' <li><a href="signup.php" class="navlink">REGISTER</a></li>';
      }
      if(isset($_SESSION['search'])){
$gob='<a href="res.php">Go back to search results</a>';
      }else{
      $gob=  '<a href="index.php">Go back</a>';

      }

     


?>