<?php
require_once("db_connect.php");
$event_id=$_POST["event_id"];
$getData="SELECT * FROM event WHERE event_id=$event_id";
$result_getData = $conn->query($getData);
//var_dump($result_getData);

$row=$result_getData->fetch_assoc();
$arr=array(
    "id"=>$row["event_id"],
    "name"=>$row["event_name"],
    "date"=>$row["event_date"],
    "time"=>$row["event_time"],
    "location"=>$row["event_location"],
    "category_name"=>$row["event_type"],
    "area"=>$row["event_area"],
    "host"=>$row["event_host"],
    "fees"=>$row["event_fees"],
    "upload_date"=>$row["event_upload_date"],
    "update_date"=>$row["event_update_date"]
);


echo json_encode($arr);
