<?php
require "conn.php";
$id = 1;
$in_temp = htmlspecialchars($_GET["in_temp"]);
$o_temp = htmlspecialchars($_GET["o_temp"]);
$humidity = htmlspecialchars($_GET["humidity"]);
$window = htmlspecialchars($_GET["window"]);
$fan = htmlspecialchars($_GET["fan"]);
$ac_status = htmlspecialchars($_GET["ac_status"]); //, ac_status = '$ac_status'

$sql = "UPDATE activity 
        SET in_temp = '$in_temp' , o_temp = '$o_temp', humidity = '$humidity', window = '$window', fan = '$fan', ac_status = '$ac_status'
        WHERE id = '$id'" ;
$conn->query($sql);

echo $fan;
?>