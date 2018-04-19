<?php
require "conn.php";

$var = _POST("var");

$sql = "UPDATE activity SET in_temp = '$var' WHERE id = 1";
$conn->query($sql);

?>