<?php
define('DBROOT','./DB/wpsfood');
require 'function.php';//include the function
checkLogin();

$username=$_COOKIE['username'];
$assPrice=trim($_POST['allPrice']);
$address=trim($_POST['address']);


if(strlen($address)>50){
    echo '<SCRIPT type=text/javascript>alert("The address is too long!");window.history.back(-1);</script>';
    die();
}elseif(strlen($address)<3){
    echo '<SCRIPT type=text/javascript>alert("The address is too short!");window.history.back(-1);</script>';
    die();
}


$Arr=getDB();//get the DB data



$OrderNo=buildOderNo();//生成一个订单号码
$Arr['orderB'][$username][]=array(
    'orderNo'=>$OrderNo,
    'allPrice'=>$assPrice,
    'address'=>$address,
    'status'=>1,
    'content'=>$Arr['order'][$username]//转移购物车订单到订单表
);


unset($Arr['order'][$username]);//删除购物车

if(saveDB($Arr))//保存，然后跳转
    echo '<SCRIPT type=text/javascript>alert("添加成功!");location.href="showOrderB.php";</script>';
else
    die('error when adding a new OrderB!');