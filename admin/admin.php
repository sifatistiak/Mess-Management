<?php
session_start();
if(!$_SESSION['loggedin']){
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="en" ng-app="messapp">
    <head>
        <title>Mess Management System 1.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen"/>
        <link rel="stylesheet" href="../css/angular-material.min.css" media="screen" />
        <link rel="stylesheet" href="../css/styles.css" media="screen">
        <link rel="stylesheet" href="../css/angular-chart.css" media="screen">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-3167377388817554",
                enable_page_level_ads: true
            });
        </script>



    </head>
    <body >
    <?php
    include "adminheader.php";


    ?>

        

    </body>
</html>