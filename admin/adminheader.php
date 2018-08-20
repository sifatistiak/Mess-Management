<?php
session_start();
if(!$_SESSION['loggedin']){
    header("Location: ../login.php");
}
?>
<html>
<head>
    <title>Mess Management System 1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="../css/angular-material.min.css" media="screen" />
    <link rel="stylesheet" href="../css/styles.css" media="screen">
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

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">House 1341 (Mess Management System 1.0)</a>


            <a href="../logout.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> <?php
                echo $_SESSION['messmanager'];

                ?>
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="admin.php">Home</a></li>
            <li><a href="signup.php">Add Member</a></li>
            <li><a href="daywizecountmealadmin.php">Date Based Count Meal</a></li>

        </ul>
    </div>
</nav>


</body>
</html>