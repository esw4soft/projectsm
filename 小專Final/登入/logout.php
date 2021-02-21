<?php
session_start();
unset($_SESSION['head']);

$_SESSION["user_logout"] = "登出成功";
header("Location: login2.php");


?>