<?php
require_once ("db_connect.php");


$sql="UPDATE s_report SET vaild=1 ";
if($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新失敗".$conn->error;
}

// vaild valid

$conn->close();

?>