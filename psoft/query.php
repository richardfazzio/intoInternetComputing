<?php
require "conn.php";

$id = 1;//$_POST["id"];

$sql = "SELECT in_temp, o_temp, window, humidity, fan, ac_status FROM activity WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["in_temp"]. ",". $row["o_temp"].",". $row["window"]. ",". $row["humidity"]. ",". $row["fan"]. ",". $row["ac_status"];
    }
}
?>