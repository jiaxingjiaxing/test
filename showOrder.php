<?php
define('DBROOT', './DB/wpsfood');
require './function.php'; //include the function
checkLogin();


$username = $_COOKIE['username'];

$Arr = getDB(); //连接数据库获取数据

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
   if (!(isset($Arr['order'][$username]) && is_array($Arr['order'][$username]))) die('Have No Date Now!');

   $orderArr = $Arr['order'][$username];




   $address = getAddres($Arr);

   $AllPrice = 0;
   foreach ($orderArr as $key => $value) {
       $AllCatPrice = 0;
       if (!$value) {
           echo 'No data!';
           die();
       }
       echo '<table class="list">
                <tr style="height:45px">
                    <td colspan="4" style="font-size: 12px; color: #AA3939;"><strong>'.$key.'</strong></td>
                </tr>
                <tr>
                    <td width="40%">Sort</td>
                    <td width="20%">Price</td>
                    <td width="20%">Quantity</td>
                    <td width="20%">Action</td>
                </tr>';
       foreach ($value as $dishName => $details) {
          echo ' <tr>
                    <td>'.$dishName.'</td>
                    <td>'.$details['dishPrice'].'</td>
                    <td>'.$details['count'].'</td>
                    <td><a href="delOrder.php?dishName=' . $dishName . '&catName=' . $key . '">Delete</a></td>
                </tr>';
           $AllCatPrice += $details['dishPrice']*(int)$details['count'];
       }
       $AllPrice += $AllCatPrice;
       echo '<tr style="height:45px">
                    <td colspan="4" style="font-size: 12px; color: #AA3939;">The All Price Of The Sort<strong>'.$AllCatPrice.'</strong></td>
                </tr></table>';
   }

    echo '<table class="list">
                <tr style="height:45px">
                    <td>AllPrice:<strong><font color="red">'. $AllPrice.'</font></strong></td>
                    <td colspan="3"><a href="delAllOrder.php">Delete All Cart</a></td>
                </tr>
                </table>';
   ?>

    <form action="addOrderB.php" method="POST">
        <table>
            <input type="hidden" id="allPrice" name="allPrice" value="<?php echo $AllPrice; ?>">
            <tr>
                <td>Address</td>
                <td><input type="text" id="address" name="address" value="<?php echo $address; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="结算" id="submit" name="submit"></td>
            </tr>
        </table>
    </form>


</div>

<div id="footer">Copyright © 2016 <a href="#">点菜系统</a>. All rigths reserved&nbsp;&nbsp;
    <a href="admin" target="_blank">后台管理</a>
</div>
</body>
</html>
