<?php
require_once("db_connect.php");
session_start();

$del_id = $_POST["selected"];

// echo json_encode($del_id);

for($i=0;$i<count($del_id); $i++){
    $id=$del_id[$i];
    // echo json_encode($id);
    
    $sql = "UPDATE authority SET valid = 0 WHERE admin_id = $id";
    $result = $conn->query($sql);

}

echo json_encode($result);



$_SESSION["user_succ"] = "刪除成功!";

$conn -> close();

?>