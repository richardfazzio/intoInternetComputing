<?php
require "conn.php";
$id = 1;//$_POST["id"];
$fan_o = 12;//$_POST["fan_o"];

$sqlplus  = "UPDATE activity SET fan_o = '$fan_o' WHERE id = '$id'";
$conn->query($sqlplus);


?>      