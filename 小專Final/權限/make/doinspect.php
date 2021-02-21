<?php
require_once ("db_connect.php");

$userID=$_POST["userID"];



$sql_edit_id="SELECT * FROM authority
WHERE admin_id='$userID'";
$result_edit_id=$conn->query($sql_edit_id);
$row = $result_edit_id->fetch_assoc();
$data=array(
    "id"=>$row["admin_id"],
    "name"=>$row["admin_name"],
    "account"=>$row["admin_account"],
    "password"=>$row["admin_password"],
    "email"=>$row["admin_email"],
    "level"=>$row["admin_authority"],
    "cdate"=>$row["admin_create_date"],
    "edate"=>$row["admin_edit_date"],

);





echo json_encode($data);

$conn->close();
