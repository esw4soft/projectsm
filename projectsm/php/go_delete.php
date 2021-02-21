<?php
require_once ("../db_connect.php");

$id=$_POST["deleteID"];

$sql="UPDATE member SET valid=0 WHERE member_id=$id";
$result=$conn->query($sql);


