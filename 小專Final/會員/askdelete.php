<?php
require_once ("../db_connect.php");

$userID=$_POST["userID"];



$sql_edit_id="SELECT member.*,experience.ex_name AS experience FROM member 
JOIN experience ON member_ex = experience.ex_value 
WHERE member_id='$userID'";
$result_edit_id=$conn->query($sql_edit_id);
$row = $result_edit_id->fetch_assoc();
$data=array(
    "id"=>$row["member_id"],
    "name"=>$row["member_name"],
);





echo json_encode($data);
