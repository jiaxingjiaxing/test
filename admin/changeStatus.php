<?php
define('DBROOT','../DB/wpsfood');
require '../function.php';//include the function

$username=$_GET['username'];
$orderNo=$_GET['orderNo'];
$Arr=getDB();//连接数据库获取数据

foreach ($Arr['orderB'][$username] as $key=>$value){
    if($value['orderNo']==$orderNo){
        $Arr['orderB'][$username][$key]['status']=++$value['status'];
        break;
    }
}

if(saveDB($Arr)) {//保存，然后跳转
    echo '<SCRIPT type=text/javascript>alert("修改成功!");location.href="doOrderB.php";</script>';
}else{
    echo 'save error!';
}

