<?php
require_once ("db_connect.php");

$o_id = $_POST["o_id"];
// echo $o_id;

$sql_list = "SELECT * FROM s_report WHERE order_id=$o_id";
$result_list = $conn->query($sql_list);

$row= $result_list ->fetch_assoc();
$arr =array(
    "e_order_id"=> $row["order_id"],
    "e_event_name"=> $row["event_name"],
    "e_purchaser_id"=> $row["purchaser_id"],
    "e_purchaser_name"=> $row["purchaser_name"],
    // "e_order_create_time"=> $row["order_create_time"],
    "e_order_fee"=> $row["order_fee"],
    "e_order_paid"=> $row["order_paid"],
    "e_payment_date"=> $row["payment_date"],
    "e_order_refunded"=> $row["order_refunded"],
    "e_order_refund_amount"=> $row["order_refund_amount"],
    "e_refund_date"=> $row["refund_date"]
    // "e_order_edit_date"=> $row["order_edit_date"]
);

echo json_encode ($arr);

// $stmt = $conn->prepare( "INSERT INTO s_report(event_name, purchaser_id
// , purchaser_name, order_create_time, order_fee, order_paid, payment_date
// , order_refunded, order_refund_amount, refund_date, order_edit_date
// )VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
// $stmt->bind_param('sisssssssss',$event_name, $purchaser_id, $purchaser_name
// , $order_create_time, $order_fee, $order_paid, $payment_date, $order_refunded
// , $order_refund_amount, $refund_date, $order_edit_date );





// $sql_list="SELECT * FROM s_report";
// $result_list=$conn->query($sql_list);
// if ($result->num_rows>0){
//     $row = $result->fetch_assoc();
//     if ($password== $row["password"]){
//         $userData=array(
//             "account"=>$account
//         );
//         $_SESSION["user"]=$userData;
//         $data=array(
//             "status"=>1,
//             "message"=>"登入成功"
//         );

//     }else{
//         $data=array(
//             "status"=>0,
//             "message"=>"密碼錯誤"
//         );
//     }

// }
// else{
//     $data=array(
//         "status"=>0,
//         "message"=>"帳號不存在"
//     );
// }
