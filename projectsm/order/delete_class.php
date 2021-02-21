<?php
require_once ("db_connect.php");


$del_id =$_POST["delete_id"];

$sql = "UPDATE S_class SET vaild = 0 WHERE order_id = $del_id";
$result = $conn->query($sql);

echo json_encode($result);



$conn-> close();

// header ("Location: temp_class.php");

?> 