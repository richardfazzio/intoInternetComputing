<?php
require "conn.php";
$id = $_POST["id"];
$d_temp = $_POST["d_temp"];

$sqlplus  = "UPDATE activity SET d_temp = '$d_temp' WHERE id = '$id'";
$conn->query($sqlplus);

$sql = "SELECT d_temp FROM activity WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["d_temp"];
    }
}

?>