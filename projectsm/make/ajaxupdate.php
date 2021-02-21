<?php
require_once("db_connect.php");

$auth_id = $_POST["auth_id"];




$sql_dataget = "SELECT * FROM authority WHERE admin_id=$auth_id";
$result_dataget = $conn->query($sql_dataget);

// var_dump($result_dataget);

$row= $result_dataget ->fetch_assoc();
$arr = array(
    "id"=> $row["admin_id"],
    "name"=> $row["admin_name"],
    "account"=> $row["admin_account"],
    "password"=> $row["admin_password"],
    "email"=> $row["admin_email"],
    "level"=> $row["admin_authority"],
    "edate"=> $row["admin_edit_date"]

);


// var_dump($arr);



//變成json黨
echo json_encode($arr);



?>