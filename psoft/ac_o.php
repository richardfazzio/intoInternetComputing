<?php
require "conn.php";
$id = $_POST["id"];
$ac_o = $_POST["ac_o"];

$sqlplus  = "UPDATE activity SET ac_o = '$ac_o' WHERE id = '$id'";
$conn->query($sqlplus);

?>      