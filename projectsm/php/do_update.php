<?php
require_once ("../db_connect.php");
date_default_timezone_set('Asia/Taipei');


$id=$_POST["edit_id"];
$name=$_POST["edit_name"];
$account=$_POST["edit_account"];
$email=$_POST["edit_email"];
$password=$_POST["edit_password"];
$phone=$_POST["edit_phone"];
$birthday=$_POST["edit_birthday"];
$gender=$_POST["edit_gender"];
$ex=$_POST["edit_ptex"];
$now=date('Y-m-d H:i:s');

$sql="UPDATE member SET member_name='$name',member_account='$account',member_email='$email',member_password='$password',member_phone='$phone',member_birthday='$birthday',member_gender='$gender',member_ex='$ex',member_edit_date='$now' WHERE member_id=$id";
if($conn->query($sql)===TRUE){
    echo "更新成功";
}else{
    echo "更新失敗".$conn->error;
}





header("Location:../member2.php");


