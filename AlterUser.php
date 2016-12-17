<?php
define('DBROOT', './DB/wpsfood');
require 'function.php'; //include the function
$Arr = getDB();
checkLogin();
foreach ($Arr['user'] as $ArrTem) {
    if ($ArrTem['username'] == $_COOKIE['username']) {
        $userInfo['username'] = $ArrTem['username'];
        $userInfo['password'] = $ArrTem['password'];
        $userInfo['address'] = $ArrTem['address'];
        break;
    }
}

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
        <a href="showDish.php">View Dish</a>
        <a href="showOrder.php">View Cart</a>
        <a href="showOrderB.php">View Order</a>
        <span class="user"><a href="loginOut.php">loginout</a></span>
        <span class="user"><a href=" AlterUser.php">Change Password</a></span>
    </div>

    <form action="AlterSave.php" method="POST">
        <table>
            <tr style="height:45px">
                <td colspan="2" style="font-size: 12px; color: #AA3939;"><strong>修改密码</strong></td>
            </tr>
            <tr>
                <td>用户名</td>
                <td><?php echo $userInfo['username'] ?></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" id="password" name="password" value="<?php echo $userInfo['password'] ?>"></td>
            </tr>
            <tr>
                <td>地址</td>
                <td><input type="text" id="address" name="address" value="<?php echo $userInfo['address'] ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Confirm" id="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</div>

<div id="footer">Copyright © 2016 <a href="#">WPS</a>. All rigths reserved&nbsp;&nbsp;
    <a href="admin"  target="_blank">后台管理</a>
</div>
</body>
</html>