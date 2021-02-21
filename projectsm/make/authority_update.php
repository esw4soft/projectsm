<?php 
require_once("db_connect.php");
date_default_timezone_set('Asia/Taipei');
session_start();

//輸入空白或沒有參數
if(!isset($_POST["authaccount"])||!isset($_POST["authname"])||!isset($_POST["authpass"])||!isset($_POST["authemail"])||!isset($_POST["authlevel"])){
    echo "請透過表單傳送資料";
    exit();
}

$now=date('Y-m-d H:i:s');
$id = $_POST["authidd"];

$name = $_POST["authname"];
$account = $_POST["authaccount"];
$password = $_POST["authpass"];
$email = $_POST["authemail"];
$level = $_POST["authlevel"];
// $edate = $_POST["authedate"];

$sql = "UPDATE authority SET admin_name='$name', admin_account='$account', admin_password='$password', admin_email='$email', admin_authority=$level, admin_edit_date='$now'
WHERE admin_id=$id";
$result_update = $conn -> query($sql);


$_SESSION["user_succ"] = "修改成功!";


$conn ->close();

header("Location: tempauth.php");

?>