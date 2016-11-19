<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
<link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
<link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
<script>
	function logout(){
	if (confirm("您确定要退出控制面板吗？"))
	top.location = "/wendaxiangmu/index.php/Admin/Index/loginOut";
	return false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- base href="http://localhost/wenda/admin.php" -->
<base target="iframe">
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="http://localhost/wenda/admin.php/Ask/index">查看问题</a>
			<a href="http://localhost/wenda/admin.php/Answer/index">查看回答</a>
			<a href="http://localhost/wenda/admin.php/Category/index">所有分类</a>
			<a href="http://localhost/wenda/admin.php/Reward/index">奖励规则</a>
			<a href="http://localhost/wenda/admin.php/User/index">网站用户</a>
			<a href="http://localhost/wenda/admin.php/System/index">系统设置</a>
			<a href="#">查看首页</a>
		</div>
		<div class="exit">
			欢迎管理员  <?php echo (session('user')); ?> 登录
			<a href="#" target="_self" onClick="logout()">退出</a>
			<a href="http://bbs.houdunwang.com/" target="_blank">获得帮助</a>
			<a href="http://www.houdunwang.com/" target="_blank">后盾网</a>
		</div>
	</div>
	<div style="height: 529px;" id="left">
		<dl>
			<dt>问题管理</dt>
			<dd><a href="<?php echo U('Ask/All');?>">所有问题</a></dd>
			<dd><a href="<?php echo U('Ask/Wait');?>">待解决问题</a></dd>
			<dd><a href="http://localhost/wenda/admin.php/Ask/solve">已解决问题</a></dd>
			<dd><a href="http://localhost/wenda/admin.php/Ask/zero">零回答问题</a></dd>
		</dl>
		<dl>
			<dt>回答管理</dt>
			<dd><a href="http://localhost/wenda/admin.php/Answer/index">所有回答</a></dd>
			<dd><a href="http://localhost/wenda/admin.php/Answer/index/filter/1">未采纳回答</a></dd>
			<dd><a href="http://localhost/wenda/admin.php/Answer/index/filter/2">已采纳回答</a></dd>
		</dl>
		<dl>
			<dt>问题分类管理</dt>
			<dd><a href="../Category/category.html">问题分类列表</a></dd>
			<dd><a href="../Category/addTop.html" >添加顶级分类</a></dd>
		</dl>
		<dl>
			<dt>奖励管理</dt>
			<dd><a href="<?php echo U('Reword/reword');?>">金币奖励规则</a></dd>
			<dd><a href="<?php echo U('Level/level');?>">经验级别规则</a></dd>
		</dl>
		<dl>
			<dt>用户管理</dt>
			<dd><a href="<?php echo U('User/show');?>">用户列表</a></dd>
			<dd><a href="<?php echo U('User/index');?>">添加新用户</a></dd>
			<dd><a href="<?php echo U('User/show1');?>">已禁止用户</a></dd>
		</dl>
		<dl>
			<dt>系统设置</dt>
			<dd><a href="<?php echo U('Window/Window');?>">网站设置</a></dd>
		</dl>
	</div>
	<div style="height: 549px; width: 1165px;" id="right">
		<iframe name="iframe" src="show.html"></iframe>
	</div>

</body></html>