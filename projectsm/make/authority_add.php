<?php
require_once("db_connect.php");
date_default_timezone_set('Asia/Taipei');
session_start();

//輸入空白或沒有參數
if(!isset($_POST["authaccount"])||!isset($_POST["authname"])||!isset($_POST["authpass"])||!isset($_POST["authemail"])||!isset($_POST["authlevel"])){
    echo "請透過表單傳送資料";
    exit();
}


//輸入帳號,信箱是否重複
$account = $_POST["authaccount"];
$email = $_POST["authemail"];

$sql = "SELECT * FROM authority WHERE admin_account='$account' OR admin_email='$email'";
$result=$conn->query($sql);
if($result->num_rows>0){
    $_SESSION["user_error"] = "帳號或信箱已存在";
    header("Location: tempauth.php");
    exit();
}else{
    $_SESSION["user_succ"] = "新增成功!";

}


$now=date('Y-m-d H:i:s');



// 新增帳號密碼
$stmt = $conn-> prepare("INSERT INTO authority
(admin_name, admin_account, admin_password, admin_email, admin_authority, admin_create_date, admin_edit_date, valid) 
VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssissi", $admin_name, $admin_account, $admin_password, $admin_email, $admin_authority, $admin_create_date, $admin_edit_date,$valid);

$admin_name = $_POST["authname"];
$admin_account = $_POST["authaccount"];
$admin_password = $_POST["authpass"];
$admin_email = $_POST["authemail"];
$admin_authority = $_POST["authlevel"];
$admin_create_date = $now;
$admin_edit_date = $now;
$valid = 1;

$stmt->execute();

$conn ->close();

header("Location: tempauth.php");





?>