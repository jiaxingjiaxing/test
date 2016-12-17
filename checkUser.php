<?php
define('DBROOT', './DB/wpsfood');
require 'function.php'; //include the function
$username = $_POST['username']; //get username
$password = $_POST['password']; //get password

$Arr = getDB(); //连接数据库获取数据

$loginFlag = 0; //登录成功否标志位
//检查用户名是否存在
foreach ($Arr['user'] as $ArrTem) {
    $loginFlag = $loginFlag || ($ArrTem['username'] == $username && $password == $ArrTem['password']);
}

if ($loginFlag) { //判断用户名密码是否正确
    setcookie("username", $username);
    echo '<SCRIPT type=text/javascript>alert("登录成功!");location.href="showDish.php";</script>';
    die();
} else {
    echo '<SCRIPT type=text/javascript>alert("登录失败，账户名或者密码不正确");window.history.back(-1);</script>';
}