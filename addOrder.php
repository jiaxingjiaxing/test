<?php
define('DBROOT','./DB/wpsfood');
require 'function.php';//include the function
checkLogin();


$username=$_COOKIE['username'];
$catName=trim($_POST['catName']);
$dishName=trim($_POST['dishName']);
$count=trim($_POST['count']);

if(!is_numeric( $count )){
    echo '<SCRIPT type=text/javascript>alert("The  Quantity  must be a number!");window.history.back(-1);</script>';
    die();
}
$Arr=getDB();//连接数据库获取数据

$dishPrice=getPriceBydishNameAndCatName($dishName,$catName,$Arr);

if (isset($Arr['order'][$username][$catName][$dishName]))
	 $count=$Arr['order'][$username][$catName][$dishName]['count']+$count;

$Arr['order'][$username][$catName][$dishName]=array(
		'dishPrice'=>$dishPrice,
		'count'=>$count
		);

if(saveDB($Arr))//保存，然后跳转
	echo '<SCRIPT type=text/javascript>alert("添加成功!");window.history.back(-1);</script>';
else
	die('错误!');