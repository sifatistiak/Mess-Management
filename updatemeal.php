<?php
require_once './api/connection.php';
session_start();
if(!$_SESSION['loggedin']){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="messapp">
<head>
    <title>Mess Management System 1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="css/angular-material.min.css" media="screen" />
    <link rel="stylesheet" href="css/styles.css" media="screen">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3167377388817554",
            enable_page_level_ads: true
        });
    </script>

    <!--link button design-->



</head>
<body >

<?php
include "studentheader.php";
?>

<div class="container">
    <h3><?php

        date_default_timezone_set('Asia/Dhaka');
        $date_now = date("l, d-M-Y, h:i:s a");
        $date_now1 = date("Y-m-d");
        echo "Current Time : '$date_now'<br>";
        $mname = $_SESSION['name'];
        ?></h3>
    <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

<!--lunch section-->

<div class="container-fluid">
    Your Selected Lunch No(For
    <?php
    echo $date_now1." ) : ";
    $lunno = -1;
    $sql = "select lunch from counter where Date='$date_now1' and membername = '$mname';";
    $res = $conn->query($sql);
    if ($res && $row = $res->fetch_assoc()) {
        $lunno = $row['lunch'];

    }
    else {
        $sql = "insert into counter values ('$date_now1','$mname',0,0);";
        $res = $conn->query($sql);
        $sql1 = "select lunch from counter where Date='$date_now1' and membername = '$mname';";
        $res1 = $conn->query($sql1);
        if ($res1 && $row = $res1->fetch_assoc()) {
            $lunno = $row['lunch'];
        }

    }
    echo $lunno;
    echo "</div>";

function addmeal($condb){
    $date_now1 = date("Y-m-d");
    $mname = $_SESSION['name'];
    $query1 =  "update counter set lunch = (lunch+1) where Date='$date_now1' and membername = '$mname'; ";

    $res = $condb->query($query1);
    header("Location: updatemeal.php");
    if ($res && $row = $res->fetch_assoc()){ echo "successful";}
    else echo "unsuccessful";

}

function removemeal($condb){
    $date_now1 = date("Y-m-d");
    $mname = $_SESSION['name'];
    $query1 =  "update counter set lunch = (lunch-1) where Date='$date_now1' and membername = '$mname' AND lunch > 0; ";

    $res = $condb->query($query1);
    header("Location: updatemeal.php");
    if ($res && $row = $res->fetch_assoc()){ echo "successful";}
    else echo "unsuccessful";

}

if (isset($_GET['add'])) {
    addmeal($conn);
}
if (isset($_GET['remove'])) {
    removemeal($conn);
}
if($lunno>0){
?>
    <br>
<a href='updatemeal.php?add=true' class="btn btn-success" role="button">Add one Lunch</a>
<br><br>
<a href='updatemeal.php?remove=true' class="btn btn-danger" role="button">Remove one Lunch</a>
    <br><br> <br>
    <?php }
    elseif ($lunno<1){

    ?>
    <br>
    <a href='updatemeal.php?add=true' class="btn btn-success" role="button">Add one Lunch</a>
    <br><br>
    <a href='updatemeal.php?remove=true' class="btn btn-danger disabled" role="button">Remove one Lunch</a>
    <br><br> <br>
    <?php }?>
    <!--
    dinner section
    -->

    <div class="container-fluid">
        Your Selected Dinner No(For
        <?php
        echo $date_now1." ) : ";
        $dinno = -1;
        $sql = "select dinner from counter where Date='$date_now1' and membername = '$mname';";
        $res = $conn->query($sql);
        if ($res && $row = $res->fetch_assoc()) {
            $dinno = $row['dinner'];
        }
        else echo "failed connection";
        echo $dinno;
        echo "</div>";

        function adddinnermeal($condb){
            $date_now1 = date("Y-m-d");
            $mname = $_SESSION['name'];
            $query2 =  "update counter set dinner = (dinner+1) where Date='$date_now1' and membername = '$mname'; ";

            $res = $condb->query($query2);
            header("Location: updatemeal.php");
            if ($res && $row = $res->fetch_assoc()){ echo "successful";}
            else echo "unsuccessful";

        }

        function removedinnermeal($condb){
            $date_now1 = date("Y-m-d");
            $mname = $_SESSION['name'];
            $query2 =  "update counter set dinner = (dinner-1) where Date='$date_now1' and membername = '$mname' AND dinner > 0; ";

            $res = $condb->query($query2);
            header("Location: updatemeal.php");
            if ($res && $row = $res->fetch_assoc()){ echo "successful";}
            else echo "unsuccessful";

        }

        if (isset($_GET['adddin'])) {
            adddinnermeal($conn);
        }
        if (isset($_GET['removedin'])) {
            removedinnermeal($conn);
        }
        if($dinno>0){
            ?>
            <br>
            <a href='updatemeal.php?adddin=true' class="btn btn-success" role="button">Add one Dinner</a>
            <br><br>
            <a href='updatemeal.php?removedin=true' class="btn btn-danger" role="button">Remove one Dinner</a>
            <br><br> <br>
        <?php }
        elseif ($dinno<1){

            ?>
            <br>
            <a href='updatemeal.php?adddin=true' class="btn btn-success" role="button">Add one Dinner</a>
            <br><br>
            <a href='updatemeal.php?removedin=true' class="btn btn-danger disabled" role="button">Remove one Dinner</a>
            <br><br> <br>
        <?php }?>
</body>
</html>
