<?php
/**
 * Created by PhpStorm.
 * User: sifat
 * Date: 22-Aug-18
 * Time: 1:04 PM
 */
require_once './api/connection.php';
date_default_timezone_set('Asia/Dhaka');
$week_day = date("l");
$sql = "SELECT name FROM schedule WHERE day ='$week_day';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$_SESSION['bazar_name']=$row['name'];
echo "Today Bazzar will be done by : ".$_SESSION['bazar_name'];
$sql1 = "SELECT name FROM schedule;";
$res1 = $conn->query($sql1);

echo "<table>"; // start a table tag in the HTML

while($row1 = $res1->fetch_assoc()){   //Creates a loop to loop through results
    echo "<tr><td>" . $row['day'] . "</td><td>" . $row['name'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";
?>