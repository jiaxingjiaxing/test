<?php 
define('DBROOT','./DB/wpsfood');
require 'function.php';//include the function
checkLogin();
$password=trim($_POST['password']);//get password
$address =trim($_POST['address']);//get address

$Arr=getDB();//连接数据库获取数据

foreach ($Arr['user'] as &$ArrTem){
	if($ArrTem['username'] == $_COOKIE['username']){
		$ArrTem['password']=$password;
		$ArrTem['address']=$address;
		break;
	}
}

if(saveDB($Arr))
    echo '<SCRIPT type=text/javascript>alert("密码修改成功!");location.href="showDish.php";</script>';
else 
	die('密码修改错误!');
?>