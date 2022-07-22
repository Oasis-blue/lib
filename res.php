<?php


session_start();
include("connection.php");

include("exfix.php");
if (
    $_POST["sugg"] != ""

) {
    if (!isset($_SESSION['user'])) {
        $suerr = "You need to be logged in to use this feature!";
    } else {
        header("Location:sugg.php");
    };
}

include("logwork.php");
include("checkses.php");
if (!isset($_SESSION['search'])) {
    header("Location:index.php");
} else {

    include("connection.php");
    $ss = $_SESSION['search'];



    $search = mysqli_query($connection, "$ss");


    if ($search and mysqli_num_rows($search) < 1) {








        $nores = '<br><h1 style="color:black;font-family:Arial;margin-left:18%">No Result Found</h1>';
    } else {
        $th = ' <tr>
    <th>Bookid</th>
    <th>Title</th>
    <th>Author</th>
    <th>Type</th>
    <th>Category</th>
    <th>Classification</th>
    <th>Course</th>
    <th>Department</th>
    <th>Year of publication</th>
    <th>Description</th>



</tr>';
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
    @import url("//fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap");

    /* Table Data */
    .doit tbody td,
    th {
        font-family: 'Open Sans', sans-serif;
        font-weight: 600;
    }

    .doit tbody td {
        height: 2.3em;
        background-color: #ecf0f1;
    }


    /* Division */
    body div:nth-child(8) {
        background-image: url("https://images.unsplash.com/photo-1494809610410-160faaed4de0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNTc5fDB8MXxzZWFyY2h8MXx8ZSUyMGxpYnJhcnl8ZW58MHx8fHwxNjU4MjY3MzI0&ixlib=rb-1.2.1&q=80&w=2560");
        background-size: cover;
    }


    /* Head */
    .head {
        font-weight: 700;
        font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 19px;
        margin-left: 5%;
        color: #ffffff;
        margin-top: 0;
        margin-bottom: 0;
    }


    .head1 {
        font-weight: 700;
        font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 19px;
        margin-left: 5%;
        margin-top: 0;
        padding-top: 19px;
    }

    /* Heading */
    h1 {
        font-size: 27px;
        margin-top: 1px;
        margin-bottom: 1px;
    }

    /* Heading */
    h2 {
        margin-top: 4px;
        margin-bottom: 4px;
    }

    /* Result */
    .result {
        width: 100% !important;
        background-color: #a2d7ca;
        padding-left: 10%;
    }

    .back {
        color: white;

    }

    .shead {
        background-color: #025859;
    }
</style>

<?php
include("resolu.php");


?>

<body>
    <div style="width: 100%; background-color:#025859">
        <p class="head">
            <a href="index.php" class="back">Go back</a>
        </p>
    </div>
    <table width="100%" class="tabbb">
        <?php

        include("header.php");

        ?>

    </table>
    <hr style="color:black">
    <div class="shead">
        <p class="head1">Search results(<?php echo mysqli_num_rows($search) ?>)</p>
        <br>
    </div>
    <?php echo $nores; ?>
    <div style="overflow-x:auto;">

    <table class="doit" width="100%">
        <?php echo $th;  ?>
        <?php while ($getdata3 = mysqli_fetch_array($search)) { ?>

            <tr class="result">
                <td>
                    <?php echo $getdata3['contentid'] ?>

                </td>
                <td><?php echo $getdata3['title'] ?></td>
                <td><?php echo $getdata3['author'] ?></td>





                <td><?php $typeid = $getdata3['typeid'];
                    $gettype = mysqli_query($connection, "select * from lib.restype where typeid='$typeid'");
                    $type = mysqli_fetch_assoc($gettype);
                    echo $type['type'];
                    ?></td>

                <td><?php $catid = $getdata3['catid'];
                    $getcat = mysqli_query($connection, "select * from lib.cate where catid='$catid'");
                    $cat = mysqli_fetch_assoc($getcat);
                    echo $cat['category'];
                    ?></td>


                <td><?php $classid = $getdata3['classid'];
                    $getclass = mysqli_query($connection, "select * from lib.class where classid='$classid'");
                    $class = mysqli_fetch_assoc($getclass);
                    echo $class['class'];
                    ?></td>


                <td><?php $courseid = $getdata3['courseid'];
                    $getcourse = mysqli_query($connection, "select * from lib.courses where courseid='$courseid'");
                    $course = mysqli_fetch_assoc($getcourse);
                    echo $course['coursename'];
                    ?></td>

                <td><?php $deptid = $getdata3['deptid'];
                    $getdep = mysqli_query($connection, "select * from lib.dept where deptid='$deptid'");
                    $dept = mysqli_fetch_assoc($getdep);
                    echo $dept['deptname'];
                    ?></td>


                <td><?php echo $getdata3['yearofpub'] ?></td>


                <td><?php echo $getdata3['description'] ?></td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $cid = $getdata3["contentid"];
                        $reqm = '<a class="view" href="req.php?rssn=' . $cid . '"' . ">Request</a>";
                    } elseif (isset($_SESSION['admin'])) {

                        $reqm = '<a class="view" href="upload/' . $getdata3['link'] . '"' . ' target="_blank">View</a>';
                    } else {
                        $reqm = '<a class="view" href="log.php">Request</a>
';
                    }


                    echo $reqm; ?>
                </td>

            </tr>
        <?php } ?>
    </table>

    </div>
    <?php

    if ($search and mysqli_num_rows($search) < 1) {

    ?><center>
            <p class="nn">We did not find any result with parameters:<br>
                <?php if ($_SESSION['sech'] != "") { ?>
                    <?php echo $_SESSION['rch']; ?>:<?php echo " "; ?><b>'<?php echo $_SESSION['sech'] ?>'</b><br><?php } ?>
                Faculty:<br><b><?php echo $_SESSION['ff']; ?></b><br>Department:<br><b> <?php echo $_SESSION['dd']; ?></b><br> <?php

                                                                                                                                if ($_SESSION['yy'] != "") {
                                                                                                                                    echo "published ";
                                                                                                                                    echo "<b>" . $_SESSION['yy'] . "</b> <br>";
                                                                                                                                } else
                                                                                                                                    echo ""; ?>




                in our database.</p>
        </center>





    <?php


    }


    ?>

    <?php



    unset($_SESSION['ff']);
    unset($_SESSION['dd']);
    unset($_SESSION['dd']);
    unset($_SESSION['yy']);
    unset($_SESSION['rch']);
    unset($_SESSION['sech']);





    ?>
    <?php if (isset($_SESSION['admin'])) {
    } else { ?>
        <center>
            <p class="nm" style="color: red;"> <?php echo $suerr  ?>
            </p>
            <form method="POST">
                <p class="nm">You can<br><button type="submit" name="sugg" value="sug" class="sugg">Request an addition</button><br>to the library.</p>

            </form>

        </center>
    <?php } ?>

    <div style="min-height: 70vh;"></div>

</body>

</html>