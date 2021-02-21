<?php
require_once ("../db_connect.php");
$sql="CREATE TABLE experience(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ex_value INT(3),
ex_name VARCHAR (30)
)";

if($conn->query($sql)===TRUE){
    echo "資料表 member 建立成功";
}else{
    echo "資料表建立錯誤".$conn->error;
}
