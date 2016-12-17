<?php
define('DBROOT', '../DB/wpsfood');
require '../function.php'; //include the function

$username = $_GET['username'];
$orderNo = $_GET['orderNo'];
$Arr = getDB(); //连接数据库获取数据


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>WPSFOOD</title>
    <link href="../html/style.css" rel="stylesheet" type="text/css" id="cssfile">
</head>
<body>
<div id="header">
    <h1>WPSFOOD</h1>
</div>
<div id="container">
    <div class="links">
        <a href="addCat.php">增加种类</a>
        <a href="addDish.php">增加菜单</a>
        <a href="doOrderB.php">查看订单</a>
        <a href="showCat.php">查看分类</a>
        <a href="showDish.php">查看菜单</a>
        <span class="user"><a href="../index.php">返回首页</a></span>
    </div>

    <?php
    if(empty($Arr['orderB'][$username])){
        echo ' <tr>
                    <td colspan="4">Have No Data!</td>
                </tr>';
        die();
    }

    foreach ($Arr['orderB'][$username] as $value) {
        if($value['orderNo']!=$orderNo)
            continue;
        echo '<table class="list">
                <tr style="height:45px;background-color: rgb(248, 248, 207)">
                    <td>OrderNo:' . $value['orderNo'] . '</td>
                    <td>AllPrice:' . $value['allPrice'] . '</td>
                    <td style="color:red">Status:' . getStatus($value['status']) . '</td>
                    <td>Address' . $value['address'] . '</td>
                </tr>';
        foreach ($value['content'] as $key => $valueB) {
            echo '<tr style="height:45px">
                    <td colspan="4" style="font-size: 12px; color: #AA3939;"><strong>' . $key . '</strong></td>
                </tr>
                <tr>
                    <td colspan="2">DishName</td>
                    <td>Price</td>
                    <td>Quantity</td>
                </tr>';
            foreach ($valueB as $keyC => $valueC) {
                echo ' <tr>
                        <td colspan="2">'.$keyC.'</td>
                        <td>'.$valueC['dishPrice'].'</td>
                        <td>'.$valueC['count'].'</td>
                      </tr>';
            }
        }
        echo '</table>';
    }
    ?>


</div>

<div id="footer">Copyright © 2016 <a href="#">点菜系统</a>. All rigths reserved&nbsp;&nbsp;
    <a href="../index.php" target="_blank">返回首页</a>
</div>
</body>
</html>

