<?php
session_start();
if(!isset($_SESSION['admin'])){

   
    header("Location:index.php");


}

include("exfix.php");
include("connection.php");
include("checkses.php");

$reid=$_GET['reid'];
$lsfa=mysqli_query($connection, "SELECT * FROM lib.reqdown where reid='$reid'");
if(mysqli_num_rows($lsfa)<1){
    header("Location:viewreq.php");
}
$lsfaa=mysqli_fetch_assoc($lsfa);
if($lsfaa['access']=='granted'){
    $sds='disabled';
    $fsse="notg";
}else{
    $fsse="fsse" ;
}


$whho=$_SESSION['admin'];

if(isset($_POST["grant"])){

    $lsfa=mysqli_query($connection, "SELECT * FROM lib.reqdown where reid='$reid'");
    $lsfaa=mysqli_fetch_assoc($lsfa);
    if($lsfaa['access']=='granted'){
        $sd='<p align="center"><span style="color:red">This request is already granted</span></p>';
    }else{
$gd=mysqli_query($connection, "UPDATE lib.reqdown SET access='granted',approvedby='$whho' where reid='$reid'");

if($gd==1){
$sd="<p align='center'><span style='color:green'>Request Granted</span></p>";

}else{
    $sd='<p align="center"><span style="color:red">Failed to grant request please try again</span></p>';
}


    }

    $reid=$_GET['reid'];
    $lsfa=mysqli_query($connection, "SELECT * FROM lib.reqdown where reid='$reid'");
    
    $lsfaa=mysqli_fetch_assoc($lsfa);
    if($lsfaa['access']=='granted'){
        $sds='disabled';
        $fsse="notg";
    }else{
        $fsse="fsse" ;
    }
}











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grant Access</title>
</head>
<?php
include("resolu.php");


?>
<style>
    .fsse{

cursor: pointer;
padding: 20px;
font-size: 2rem;
background-color: mediumslateblue;
    }
    .fsse:hover{

        background-color: blueviolet;
color: white;
    }

    .notg{

cursor: not-allowed;
padding: 20px;
font-size: 2rem;
background-color: mediumslateblue;
    }




</style>

<body>
   
<table width="100%">
<?php

include("header.php");

?>

</table>  
<hr>

<br>
<div class="colo">
<br>
<center>
<a href="index.php">GO TO HOMEPAGE</a>
</center>
<br> </div>
<?php  echo $sd ?? "";  ?>

<?php

if($lsfaa['access']=='granted'){


?>


<br>
<h1 align="center">You are about to grant user <?php echo $lsfaa['userid']  ?> access a private content.</h1>
<h2 align="center">Title: <?php $dxg=$lsfaa['contentid'];

$das=mysqli_query($connection, "SELECT * FROM lib.content where contentid='$dxg'");
$dg=mysqli_fetch_assoc($das);
echo $dg['title'];

?> .</h1>
<h2 align="center">CONTENT ID: <?php echo  $lsfaa['contentid']   ?> .</h1>
<h2 align="center">Date of request: <?php echo $lsfaa['date']    ?> .</h1>
<br><br>
<h1 align="center">This request is already Granted.</h1>





<?php

}else{

?>




<br>
<h1 align="center">You are about to grant user <?php echo $lsfaa['userid']  ?> access a private content.</h1>
<h2 align="center">Title: <?php $dxg=$lsfaa['contentid'];

$das=mysqli_query($connection, "SELECT * FROM lib.content where contentid='$dxg'");
$dg=mysqli_fetch_assoc($das);
echo $dg['title'];

?> .</h1>
<h2 align="center">CONTENT ID: <?php echo  $lsfaa['contentid']   ?> .</h1>
<h2 align="center">Date of request: <?php echo $lsfaa['date']    ?> .</h1>

<?php }

?>


<div style="display: flex; justify-content: center; align-items: center;">

<form method="POST">

<button type="submit" value="r" name="grant" <?php echo $sds ?? "" ?> class="<?php echo $fsse ?? "" ?>">Grant Access</button>


</form>


</div>



<div style="min-height:80vh ;"></div>

</body>
</html>