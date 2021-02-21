<?php
require_once ("db_connect.php");
$sql = "SELECT * FROM `class` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "課程名稱 " . $row["class_name"]."<br>";
    }
} else {
    echo "沒有資料";
}

?>

