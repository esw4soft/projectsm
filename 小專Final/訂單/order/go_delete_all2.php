<?php
require_once ("db_connect.php");
$deleteAllID=$_POST["deleteAllID"];
$data=array(
    "all"=> $deleteAllID
);


for($i=0;$i<count($deleteAllID);$i++){
    $id=$deleteAllID[$i];
    // echo json_encode($id);
    $sql="UPDATE s_class SET vaild=0 WHERE order_id=$id";
    $result=$conn->query($sql);
}


echo json_encode($result);

//header("Location:../temp_class.php");


