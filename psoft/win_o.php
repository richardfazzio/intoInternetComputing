<?php
require "conn.php";
$id = $_POST["id"];
$win_o = $_POST["win_o"];

$sqlplus  = "UPDATE activity SET win_o = '$win_o' WHERE id = '$id'";
$conn->query($sqlplus);


?>      