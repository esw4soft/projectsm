<?php
require_once ("db_connect.php");

$order_id=$_POST["a"];
$event_name=$_POST["event_name2"];
// echo"$event_name";

$purchaser_id=$_POST["purchaser_id"];
$purchaser_name=$_POST["purchaser_name"];
$order_create_time=$_POST["order_create_time"];
$order_fee=$_POST["order_fee"];
$order_paid=$_POST["order_paid"];
$payment_date=$_POST["payment_date"];
$order_refunded=$_POST["order_refunded"];
$order_refund_amount=$_POST["order_refund_amount"];
$refund_date=$_POST["refund_date"];
$order_edit_date=$_POST["order_edit_date"];


// echo$order_id;


$sql="UPDATE s_report SET 
-- order_id='$order_id',
event_name='$event_name',
purchaser_id='$purchaser_id',
purchaser_name='$purchaser_name',
order_create_time='$order_create_time',
order_fee='$order_fee',
order_paid='$order_paid',
payment_date='$payment_date',
order_refunded='$order_refunded',
order_refund_amount='$order_refund_amount',
refund_date='$refund_date',
order_edit_date='$order_edit_date'

  WHERE order_id=$order_id";

  if($conn->query($sql)){
    echo "成功";
  }else{
    echo "失敗".$conn->error;
  } ;

// echo"$event_name";


// var_dump($sql);


// $stmt->execute();

$conn->close();

header ("Location: temp_event.php");