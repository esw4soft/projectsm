<?php
//連線

$server_name = "localhost";
$user_name = "root";
$password = "0528";
$db_name = "projects";

$conn = new mysqli($server_name, $user_name,$password,$db_name);
// if($conn->connect_error){
//     die("連線錯誤:". $conn->connect_error);
// }else{
//     echo "資料連線成功";
// }



?>


