<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<h2 align="center" style="color: red">个人信息</h2>
<body>
    <table border="1" align="center">
        <tr>
            <td  align="center" width="200" style="color:blue;">用户名</td>
            <td align="center"  width="200" style="color: red"><?php echo ($arr["username"]); ?></td>
        </tr>
        <tr>
            <td  align="center" style="color: #003366;">密码</td>
            <td  align="center" style="color: green"><?php echo ($arr["pwd"]); ?></td>
        </tr>
        <tr>
            <td align="center" style="color: #2DBEEA">登录时间</td>
            <td align="center" style="color: #4A8091"><?php echo ($arr["login_time"]); ?></td>
        </tr>
        <tr>
            <td align="center" style="color: #003366">上一次登录时间</td>
            <td align="center" style="color: #006600"><?php echo ($arr["last_time"]); ?></td>
        </tr>
        <tr>
            <td align="center" style="color: #d43f3a">IP</td>
            <td align="center" style="color: #d43f3a"><?php echo ($arr["last_ip"]); ?></td>
        </tr>
    </table>
</body>
</html>