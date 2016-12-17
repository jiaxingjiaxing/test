<?php
define('DBROOT','./DB/wpsfood');
require 'function.php';//include the function
checkLogin();


$username=$_COOKIE['username'];
$catName=trim($_GET['catName']);
$dishName=trim($_GET['dishName']);

$Arr=getDB();//连接数据库获取数据

if(!(isset($Arr['order'][$username])&&is_array($Arr['order'][$username]))) die('Del error!');


	if($Arr['order'][$username][$catName][$dishName]){
		unset($Arr['order'][$username][$catName][$dishName]);
		saveDB($Arr);
		echo '<SCRIPT type=text/javascript>alert("删除成功!");location.href="showOrder.php";</script>';
	}


