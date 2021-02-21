<?php
require_once ("../db_connect.php");

$sql="CREATE TABLE member(
member_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
member_name VARCHAR(50) NOT NULL,
member_account VARCHAR(20),
member_email VARCHAR (80) NOT NULL,
member_password VARCHAR(30) NOT NULL,
member_phone VARCHAR(30) NOT NULL,
member_birthday DATE NOT NULL,
member_gender VARCHAR (5) NOT NULL,
member_ex INT(1),
member_create_date DATE,
member_edit_date DATE,
valid INT(1) NOT NULL
)";

if($conn->query($sql)===TRUE){
    echo "資料表 member 建立成功";
}else{
    echo "資料表建立錯誤".$conn->error;
}

$conn->close();
?>