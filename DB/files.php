<?php
//这里是文本数据库操作函数部分
//该函数的功能是将数组对象存储到文本文件
function saveDB($Arr)
{
	$fileName=DBROOT;//数据存储文本文件为  :wpsfood
	
	$Arr=serialize($Arr);//将数据系列化为一串字符串，以便于存储
    
	if(!$fso=fopen($fileName,'w'))//打开文本文件，以便于存储   w==>以只写的方式打开文件
	   die('无法打开数据库文件');
	
	if(!fwrite($fso,$Arr))//将数据写入文本文件
		die('写入数据到文件失败');

    fclose($fso);//关闭打开的文件
	return true;
}
//获取数据库函数
function getDB()
{   
	$fileName=DBROOT;//数据存储文本文件为  :wpsfood
	if(!file_exists($fileName))//判断文件是否存在
		die('无法读取数据库文件');
	$fso = fopen($fileName, 'r');//r==>以只读的方式打开文件
	$str= fread($fso, filesize($fileName));//将打开的文件的数据读取出来传到 $str变量
	fclose($fso);//关闭文件
	$Arr=unserialize($str);//将序列化的数据$str反序列化为数组存储到$Arr变量
	return $Arr;//以数组的方式返回数据.
}
?>