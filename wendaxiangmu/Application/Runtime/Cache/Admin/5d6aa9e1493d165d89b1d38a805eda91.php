<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
    <h1 style="color: #ff0000">管理员 <?php echo (session('user')); ?> 您好</h1>
	<table border="1">
		<tr>
			<td>用户名</td>
			<td><?php echo (session('user')); ?></td>
		</tr>
		<tr>
			<td>您的上一次登录时间：</td>
			<td><?php echo ($arr["last_time"]); ?></td>
		</tr>
		<tr>
			<td>您的本次登录时间是：</td>
			<td><?php echo ($arr["login_time"]); ?></td>
		</tr>
		<tr>
			<td>您的上一次登录IP是：</td>
			<td><?php echo ($arr["last_ip"]); ?></td>
		</tr>
		<tr>
			<td>您的本次登录IP是：</td>
			<td><?php echo ($arr["login_ip"]); ?></td>
		</tr>
	</table>
</center>
</body>
</html>