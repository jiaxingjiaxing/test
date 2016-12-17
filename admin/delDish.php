<?php
define('DBROOT','../DB/wpsfood');
require '../function.php';//include the function

$dishName=$_GET['dishName'];
$catName=$_GET['catName'];

$Arr=getDB();//连接数据库获取数据

if(isset($Arr['cat'])&&is_array($Arr['cat'])) {
	if($Arr['cat'][$catName]){
		foreach ($Arr['cat'][$catName] as $key=>$value){
			if($value['dishName'] == $dishName){
				unset($Arr['cat'][$catName][$key]);
				saveDB($Arr);//保存，然后跳转
				echo '<SCRIPT type=text/javascript>alert("删除成功!");location.href="showDish.php";</script>';
				die();
			}
		}
		
	}
}

