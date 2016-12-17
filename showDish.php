<?php
define('DBROOT','./DB/wpsfood');
require './function.php';//include the function
checkLogin();

$Arr=getDB();
if(!(isset($Arr['cat'])&&is_array($Arr['cat']))) die('no data!');
$catArr=$Arr['cat'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>点菜系统</title>
    <link href="html/style.css" rel="stylesheet" type="text/css" id="cssfile">
</head>
<body>
<div id="header">
    <h1>点菜系统</h1>
</div>
<div id="container">
    <div class="links">
        <a href="showDish.php">查看菜单</a>
        <a href="showOrder.php">查看购物</a>
        <a href="showOrderB.php">已点菜单</a>
        <span class="user"><a href="loginOut.php">注销登陆</a></span>
        <span class="user"><a href=" AlterUser.php">修改密码</a></span>
        <span class="user"><?php echo $_COOKIE["username"];?></span>
    </div>



    <?php
    foreach ($catArr as $key=>$value){

        echo '<table class="list">
                <tr style="height:45px">
                    <td colspan="4" style="font-size: 12px; color: #AA3939;"><strong>'.$key.'</strong></td>
                </tr>
                <tr>
                    <td>DishName</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Action</td>
                 </tr>
                ';
        if(!$value){
            echo 'no data!';
        }
        foreach ($value as $dish){
            echo '<tr>
                   <form action="addOrder.php" method="POST">

                    <td width="50%">'.$dish['dishName'].'</td>
                    <td width="10%">'.$dish['dishPrice'].'</td>

                    <input type="hidden" name="catName" value="'.$key.'">
                    <input type="hidden" name="dishName" value="'.$dish['dishName'].'">
                    <td width="10%"><input type="number" name="count" value="1"></td>

                    <td width="30%"><input type="submit"  value="Add Cart"></td>

                   </form>
                 </tr>';
        }
        echo '</table>';
    }
    ?>
</div>

<div id="footer">Copyright © 2016 <a href="#">点菜</a>. All rigths reserved&nbsp;&nbsp;
    <a href="admin"  target="_blank">管理</a>
</div>
</body>
</html>