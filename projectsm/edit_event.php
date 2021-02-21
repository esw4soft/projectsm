<?php
require_once("db_connect.php");
ini_set('date.timezone','Asia/Taipei');
$now=date("Y-m-d H:i:s");

$event_id=$_POST["event_id"];
$event_name=$_POST["event_name"];
$event_date=$_POST["event_date"];
$event_time=$_POST["event_time"];
$event_location=$_POST["event_location"];
$event_type=$_POST["event_type"];
$event_area=$_POST["event_area"];
$event_host=$_POST["event_host"];
$event_fees=$_POST["event_fees"];

$sql="UPDATE event SET event_name='$event_name',event_date='$event_date',event_time='$event_time',event_location='$event_location',
event_type=$event_type,event_area='$event_area',event_host='$event_host',event_fees=$event_fees,event_update_date='$now' WHERE event_id=$event_id";

if($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新失敗".$conn->error;
}

$conn->close();

header("Location:event_list.php");
?>

