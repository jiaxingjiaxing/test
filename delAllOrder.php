<?php
define('DBROOT','./DB/wpsfood');
require 'function.php';//include the function..
checkLogin();


$username=$_COOKIE['username'];

$Arr=getDB();//连接数据库获取数据
if(!(isset($Arr['order'][$username])&&is_array($Arr['order'][$username]))) die('Del error!');


if($Arr['order'][$username]){
    unset($Arr['order'][$username]);//删除订单
    saveDB($Arr);//保存，然后跳转
    echo '<SCRIPT type=text/javascript>alert("Del the all cart successfully!");location.href="showOrder.php";</script>';
}


