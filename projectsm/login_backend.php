<?php
session_start();
require_once("db_connect.php");

//步驟一：先確定 account & password 是否有輸入(否：顯示正常管道登入)
//步驟二：是的話，1. 連結，並讀取存有會員資料的資料庫 2.存取接收的帳密
//步驟三：檢查資料是否存在(num_rows>0)，存在的話把帳密echo出來(否：帳號不存在)
//步驟四：另外判斷密碼與資料庫的密碼是否一致，是：(否：密碼錯誤)
// if(isset($_POST["account"])&& isset($_POST["password"])){
    $account=$_POST["account"];
    // echo $account;
    $password=$_POST["password"];
    $sql="SELECT * FROM authority WHERE admin_account='$account'";
    // var_dump($sql);

    $result=$conn->query($sql);

    if($result->num_rows>0){
        $row =$result->fetch_assoc();
        echo $row["admin_account"]."<br>";
        echo $row["admin_password"];

        if($password== $row["admin_password"]){
            $userData=array(
                "account"=>$account
            );
            $_SESSION["user"]=$userData;
            unset($_SESSION["user_error"]);
            $_SESSION["headdd"]= $row["admin_name"];
            header("Location:member2.php");
            echo "登入成功";
        }else{
            echo "登入失敗：密碼錯誤";
            $_SESSION["user_error"]="登入失敗：密碼錯誤";
            header("Location:login2.php");
            exit();
        }
    }else{
            echo "帳號不存在";
            $_SESSION["user_error"]="帳號不存在";
            header("Location:login2.php");
            exit();
        }
// }else{
//     echo"請透過正當管道進入";
// }