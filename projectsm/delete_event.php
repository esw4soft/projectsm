<?php
require_once("db_connect.php");
$delete_id=$_POST["delete_id"];

$sql="UPDATE event SET event_valid=0 WHERE event_id=$delete_id";
$result=$conn->query($sql);

$conn->close();

