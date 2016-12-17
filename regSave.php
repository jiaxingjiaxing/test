<?php
define('DBROOT', './DB/wpsfood');
require './function.php'; //include the function

$username = trim($_POST['username']); //get username
$password = trim($_POST['password']); //get password
$address = trim($_POST['address']); //get address

$Arr = getDB(); //连接数据库获取数据

//检查用户名是否存在
foreach ($Arr['user'] as $ArrTem) {
    if ($username == $ArrTem['username']) {
        echo '<SCRIPT type=text/javascript>alert("The User name exists,please change another!");window.history.back(-1);</script>';
        die();
    }

    if(strlen($username)<3){
        echo '<SCRIPT type=text/javascript>alert("The username is too short!");window.history.back(-1);</script>';
        die();
    }

    if(strlen($password)<3){
        echo '<SCRIPT type=text/javascript>alert("The password is too short!");window.history.back(-1);</script>';
        die();
    }


    if(strlen($address)>50){
        echo '<SCRIPT type=text/javascript>alert("The address is too long!");window.history.back(-1);</script>';
        die();
    }elseif(strlen($address)<3){
        echo '<SCRIPT type=text/javascript>alert("The address is too short!");window.history.back(-1);</script>';
        die();
    }



}

$Arr['user'][] = array( //add a new row to DB
    'username' => $username,
    'password' => $password,
    'address' => $address
);

if (saveDB($Arr)){
    setcookie("username",$username);
    echo '<SCRIPT type=text/javascript>alert("注册成功!");location.href="showDish.php";</script>';
}else{
    die('发生错误!');
}
?>