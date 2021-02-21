<?php
require_once("db_connect.php");

$test = $_GET["bss"];

if(isset($test)){
    echo "拿到資料";
    exit();
}else{
    echo "沒有拿到";
}





$conn -> close();
?>




假設三個CheckBox分別為CheckBox1,CheckBox2,CheckBox3
sql="select * from table where 1=1 "

if(this.CheckBox1.Checked==true)
sql+=" and 你的第1個條件 ";
if(this.CheckBox2.Checked==true)
sql+=" and 你的第2個條件 ";
if(this.CheckBox3.Checked==true)
sql+=" and 你的第3個條件 ";