<?php
require_once ("../db_connect.php");
$deleteAllID=$_POST["deleteAllID"];
$data=array(
    "all"=> $deleteAllID
);


for($i=0;$i<count($deleteAllID);$i++){
    $id=$deleteAllID[$i];
    echo json_encode($id);
    $sql="UPDATE member SET valid=0 WHERE member_id=$id";
    $result=$conn->query($sql);
}

//header("Location:../member2.php");


