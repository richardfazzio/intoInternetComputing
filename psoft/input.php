<?php
require "conn.php";

$var = 1;

$sql = "SELECT d_temp, sys_status, win_o, fan_o, ac_o, window FROM activity WHERE id ='$var'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["d_temp"]. ",". $row["sys_status"]. ",". $row["win_o"]. ",". $row["fan_o"]. ",". $row["ac_o"];
    }
}

?>