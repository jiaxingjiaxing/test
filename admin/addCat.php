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



    <form action="addCatSave.php" method="POST">
        <table>
            <tr style="height:45px">
                <td colspan="2" style="font-size: 12px; color: #AA3939;"><strong>增加种类</strong></td>
            </tr>
            <tr><td>种类名</td><td><input type="text" id="catName" name="catName" placeholder="种类名" ></td></tr>
            <tr><td><input type="submit" value="添加" id="submit" name="submit"></td></tr>
        </table>
    </form>
</div>

<div id="footer">Copyright © 2016 <a href="#">WPS</a>. All rigths reserved&nbsp;&nbsp;
    <a href="../index.php" target="_blank">返回首页</a>
</div>
</body>
</html>