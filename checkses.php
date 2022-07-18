<?php



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
    <label for="pass">PIN:<br></label><input type="password" name="pass" id="pass" class="pass" placeholder="Enter your pin" required >
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
        $vie='<a class="navlink" href="viewreq.php">Requests</a>';
    $logout='<a class="flink"  href="logout.php">LOG OUT</a>';
    

    $reqm='<a class="view" href="upload\ '.$getdata3['link'].' target="_blank">View</a>';
$userlog="";
$getlibcard="";
    }else{

      $getlibcard=' <li><a href="signup.php" class="navlink">GET A LIBRARY CARD</a></li>';
    }
    
    if(isset($_SESSION['user'])){$adlog="";
      $logout='<a class="flink"  href="logout.php">LOG OUT</a>';
      $getlibcard="";
      //$reqm="";
      }else{
  $reqm='<a class="view" href="log.php">Request</a>
';   $getlibcard=' <li><a href="signup.php" class="navlink">GET A LIBRARY CARD</a></li>';
      }
      if(isset($_SESSION['search'])){
$gob='<a href="res.php">Go back to search results</a>';
      }else{
      $gob=  '<a href="index.php">Go back</a>';

      }

?>