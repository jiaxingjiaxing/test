<?php
require 'DB/files.php';//include the DB

//检查登陆状态
function checkLogin(){
	if (!isset($_COOKIE["username"])){
		echo '<SCRIPT type=text/javascript>alert("你没有登录，请登录!");location.href="login.htm";</script>';
		die();
	}
}


//通过 菜单种类(cat) 菜单名(dish) 获取菜单名价格
function getPriceBydishNameAndCatName($dishName,$catName,$Arr){
	foreach ($Arr['cat'][$catName] as $key=>$value){
		if($value['dishName'] == $dishName){
			return $Arr['cat'][$catName][$key]['dishPrice'];
		}
	}
	die('getPriceBydishNameAndCatName error!');
}

function getAddres($Arr){
    $username=$_COOKIE['username'];
    foreach ($Arr['user'] as $key=>$value){
        if($value['username'] == $username){
            return $Arr['user'][$key]['address'];
        }
    }

}

//生成订单号
function    buildOderNo(){
    return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}

//根据状态码获取状态
function getStatus($no){
    switch($no){
        case 1:return 'ACCEPTED';break;
        case 2:return 'BEING DELIVERED';break;
        case 3:return 'COMPLETED';break;
        default:return 'COMPLETED';
    }
}

//订单状态转换
function changStatus($no){
    if(1==$no)
        return 2;
    else
        return 3;

}

function changStatusLink($username,$orderNo,$no){
    if(1==$no)
        return "<a href='changeStatus.php?username=$username&orderNo=$orderNo'>DELIVERED</a>";
    elseif(2==$no)
        return "<a href='changeStatus.php?username=$username&orderNo=$orderNo'>COMPLETED</a>";
    return "COMPLETEDED";
}