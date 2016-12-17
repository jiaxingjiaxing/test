<?php
define('DBROOT','../DB/wpsfood');
require '../function.php';//include the function

$dishName=$_POST['dishName'];
$dishPrice=$_POST['dishPrice'];
$catName=$_POST['cat'];

$Arr=getDB();//连接数据库获取数据


if(isset($Arr['cat'])&&is_array($Arr['cat'])) {
	if($Arr['cat'][$catName]){
		foreach ($Arr['cat'][$catName] as $key=>$value){
			if($value['dishName'] == $dishName){
				$Arr['cat'][$catName][$key]['dishPrice']=$dishPrice;
				saveDB($Arr);//保存，然后跳转
				echo '<SCRIPT type=text/javascript>alert("修改成功!");location.href="showDish.php";</script>';
				die();
			}
		}
		
	}
}

