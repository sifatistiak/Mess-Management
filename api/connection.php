<?php
session_start();
$servername = "sql307.epizy.com";
$username = "epiz_22579131";
$password = "zARCUDQOgWjZl";
$dm="epiz_22579131_messmanagement";

$conn= new mysqli($servername, $username, $password,$dm);

function escape($s){
    return mysql_escape_string($s);
}

?>