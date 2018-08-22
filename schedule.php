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
echo "<h3 align='center'>Today Bazzar will be done by : ".$_SESSION['bazar_name']."</h3><br><br><br><br>";
$sql1 = "SELECT * FROM schedule;";
$res1 = $conn->query($sql1);
?><style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<?php
echo "<table align='center' border='1' cellpadding='2px' cellspacing='1px'>"; // start a table tag in the HTML
echo "<caption>Bazar Schedule Table</caption>"; // start a table tag in the HTML

while($row1 = $res1->fetch_assoc()){   //Creates a loop to loop through results
    echo "<tr><td>" . $row1['day'] . "</td><td>" . $row1['name'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";
?>