<?php
session_start();
if(!$_SESSION['loggedin']){
    header("Location: login.php");
}
?>
<html>
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


</head>
<body >

<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid">
        <div class="navbar-default">
            <a class="navbar-brand" href="student.php">House 1341 (Mess Management System 1.0)</a>


        </div>
        <div align="right">
            <?php
            echo $_SESSION['name'];

            ?>

            <a href="logout.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out "></span> Log out
            </a>
        </div>
        <ul class="nav navbar-inverse layout-row">
            <li><a href="student.php">Home</a></li>
            <li><a href="updatemeal.php">Update Meal</a></li>
            <li><a href="countmeal.php">Count Meal</a></li>
            <li><a href="daywisecountmeal.php">Date Based Count Meal</a></li>


        </ul>

    </div>
</nav>


</body>
</html>
