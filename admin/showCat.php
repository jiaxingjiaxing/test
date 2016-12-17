<?php
define('DBROOT','../DB/wpsfood');
require '../function.php';//include the function


$Arr=getDB();//连接数据库获取数据
if(!(isset($Arr['cat'])&&is_array($Arr['cat']))) die('暂无数据!');

$catArr=$Arr['cat'];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>点菜系统</title>
    <link href="../html/style.css" rel="stylesheet" type="text/css" id="cssfile">
</head>
<body>
<div id="header">
    <h1>点菜系统</h1>
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
        echo '<table class="list">
                <tr style="height:45px">
                    <td colspan="2" style="font-size: 12px; color: #AA3939;"><strong>查看种类</strong></td>
                </tr>
                <tr><td>Sort</td><td>Action</td></tr>';

        foreach ($catArr as $key=>$value){
        echo '<tr><td>'.$key.'</td><td> <a href="delCat.php?catName='.$key.'">Delete</a></td></tr>';
    }
        echo '</table>';


    ?>
</div>

<div id="footer">Copyright © 2016 <a href="#">点菜系统</a>. All rigths reserved&nbsp;&nbsp;
    <a href="../index.php" target="_blank">返回首页</a>
</div>
</body>
</html>