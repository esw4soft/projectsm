<?php
require_once ("db_connect.php");
date_default_timezone_set("Asia/Taipei");
$stmt=$conn->prepare("INSERT INTO event(event_name,event_date,event_time,
event_location,event_type,event_area,event_host,event_fees,event_upload_date,event_valid) VALUES(?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param('ssssissisi',$event_name,$event_date,$event_time,
    $event_location,$event_type,$event_area,$event_host,$event_fees,$event_upload_date,$event_valid);

$now=date("Y-m-d H:i:s");

$event_name=$_POST["event_name"];
$event_date=$_POST["event_date"];
$event_time=$_POST["event_time"];
$event_location=$_POST["event_location"];
$event_type=$_POST["event_type"];
$event_area=$_POST["event_area"];
$event_host=$_POST["event_host"];
$event_fees=$_POST["event_fees"];
$event_upload_date=$now;
$event_valid=1;

$stmt->execute();


$stmt->close();
$conn->close();

header('Location: event_list.php');


?>

