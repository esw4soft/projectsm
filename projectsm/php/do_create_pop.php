<?php
require_once ("../db_connect.php");
unset($data);
session_start();
date_default_timezone_set('Asia/Taipei');
unset($_SESSION["account_error"]);
unset($_SESSION["password_error"]);
unset($_SESSION["success"]);

$name=$_POST["name"];
$account=$_POST["account"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$phone=$_POST["phone"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];
$experience=$_POST["experience"];




if (!isset($_POST["name"]) || !isset($_POST["account"])||!isset($_POST["email"])||!isset($_POST["password"])||!isset($_POST["phone"])||!isset($_POST["birthday"])||!isset($_POST["experience"])){
//    echo "請透過表單傳送資料，並確實填寫。";
    exit();
}

$sql="SELECT member_account,member_email FROM member WHERE member_account='$account' OR member_email='$email' ";
$result=$conn->query($sql);

//$data=array('account'=>$account);
//echo json_encode($data);
//exit();

if($result->num_rows>0){
    $data1=array(
        "status"=>"0",
        "message"=>"*新增會員失敗，帳號已存在"
    );
    echo json_encode($data1);
    unset($data1);
    exit();
}

if($password!==$repassword){
    exit();
}


$now=date('Y-m-d H:i:s');
$stmt = $conn->prepare("INSERT INTO member(member_name,member_account,member_email,member_password,member_phone,member_birthday,member_gender,member_ex,member_create_date,valid) VALUES(?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssisi',$name,$account,$email,$password,$phone,$birthday,$gender,$ex,$create_date,$valid);
$name=$_POST["name"];
$account=$_POST["account"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];
$ex=$_POST["experience"];
$create_date=$now;
$valid = 1;
if($stmt->execute()){
    $data=array(
        "status"=>"1",
    );
    echo json_encode($data);
//    header("Location:../member2.php");
}




$stmt->close();
$conn->close();


