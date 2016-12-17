<?php
define('DBROOT','../DB/wpsfood');
require '../function.php';//include the function

$catName=$_GET['catName'];

$Arr=getDB();//连接数据库获取数据
if(isset($Arr['cat'][$catName])&&is_array($Arr['cat'][$catName])) {
		unset($Arr['cat'][$catName]);
		saveDB($Arr);//保存，然后跳转
		echo '<SCRIPT type=text/javascript>alert("删除成功!");location.href="showCat.php";</script>';
}else{
	echo 'del errorb!';
}

