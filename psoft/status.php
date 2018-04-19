<?php
require "conn.php";

$id = 1;//$_POST["id"];
$sys_status = 5;//$_POST["sys_status"];

$sqlplus  = "UPDATE activity SET d_temp = '$sys_status' WHERE id = '$id'";
$conn->query($sqlplus);

$sql = "SELECT sys_status FROM activity WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["sys_status"];
    }
}
?>