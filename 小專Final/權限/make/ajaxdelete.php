<?php
require_once("db_connect.php");
session_start();

$del_id = $_POST["del_idbox"];
// $del_id = 23;

$sql = "UPDATE authority SET valid = 0 WHERE admin_id = $del_id";
$result = $conn->query($sql);


echo json_encode($result);

$_SESSION["user_succ"] = "刪除成功!";

$conn -> close();

?>