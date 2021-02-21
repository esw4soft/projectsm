<?php
require_once ("db_connect.php");

echo date_default_timezone_get();

ini_set("date.timezone",'Asia/Taipei');

echo"Asia/Taipei";
echo date("Y:m:s");

$now=date("Y:m:s");

echo($now);

if(!isset($_POST["event_name"])){
    echo "請透過表單傳送資料";
    exit();
}


$stmt = $conn->prepare( "INSERT INTO s_report(event_name, purchaser_id
, purchaser_name, order_create_time, order_fee, order_paid, payment_date
, order_refunded, order_refund_amount, refund_date, order_edit_date, vaild
)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sisssssssssi',$event_name, $purchaser_id, $purchaser_name
, $order_create_time, $order_fee, $order_paid, $payment_date, $order_refunded
, $order_refund_amount, $refund_date, $order_edit_date, $vaild );

$event_name=$_POST["event_name"];
$purchaser_id=$_POST["purchaser_id"];
$purchaser_name=$_POST["purchaser_name"];
$order_create_time=$now;
$order_fee=$_POST["order_fee"];
$order_paid=$_POST["order_paid"];
$payment_date=$_POST["payment_date"];
$order_refunded=$_POST["order_refunded"];
$order_refund_amount=$_POST["order_refund_amount"];
$refund_date=$_POST["refund_date"];
$order_edit_date=$_POST["order_edit_date"];
$vaild=1;



$stmt->execute();

$conn->close();

header ("Location: temp_event.php");