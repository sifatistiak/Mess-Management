<?php
require_once '../api/connection.php';
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-3167377388817554",
            enable_page_level_ads: true
        });
    </script>

</head>
<body>

<?php
include "adminheader.php";
?>
<div>
    <form name="form" action="" method="get">
        Date :
        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"  />
        <input type="submit" name="submit" value="Refresh"/>
</div>
<?php
$dob = $_GET['date'];
$sql = "SELECT SUM(lunch) AS suml, SUM(dinner) AS sumd FROM counter WHERE Date = '$dob'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$sumlunch = $row['suml'];
$sumdinner = $row['sumd'];
echo "<p align='center' style=\"color:#ff0000;\">Lunches : ".$sumlunch."</p>";
echo "<p align='center' style=\"color:#29a329;\">Dinners : ".$sumdinner."</p>";
?>
</body>
</html>
