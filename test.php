
<?php

if($_POST['g']!=""){
    echo "yes";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a class="" href="upload/$ret['link']" target="_blank"  onclick="fdd()">View</a>

<form method="POST">

<input type="submit" hidden name="g" id="myCheck">
</form>

<script>
function fdd() {
  document.getElementById("myCheck").click();
}
</script>
</body>
</html>
