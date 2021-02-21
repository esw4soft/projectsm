<?php
require_once ("../db_connect.php");
session_start();
date_default_timezone_set('Asia/Taipei');
unset($_SESSION["account_error"]);
unset($_SESSION["password_error"]);
unset($_SESSION["success"]);


if (!isset($_POST["name"]) || !isset($_POST["account"])||!isset($_POST["email"])||!isset($_POST["password"])||!isset($_POST["phone"])||!isset($_POST["birthday"])||!isset($_POST["ptex"])){
    echo "請透過表單傳送資料，並確實填寫。";
    header("Location:../create_member.php");
    exit();
}

$account=$_POST["account"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

$sql="SELECT member_account,member_email FROM member WHERE member_account='$account' OR member_email='$email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "帳號已存在";
    $_SESSION["account_error"]="*帳號已存在";
    header("Location:../create_member.php");
    exit();
     //header????? 把頁面導回原本那頁並顯示錯誤訊息
}


if($password!==$repassword){
    echo "密碼不一致";
    $_SESSION["password_error"]="*密碼不一致";
    header("Location:../create_member.php");
    exit();
     //header????? 把頁面導回原本那頁並顯示錯誤訊息
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
$ex=$_POST["ptex"];
$create_date=$now;
$valid=1;
$stmt->execute();

header("Location:../create_member.php");
$last_id=$conn->insert_id;
echo "新會員 建立成功,編號為 $last_id";
$_SESSION["success"]= $last_id;


$stmt->close();
$conn->close();


