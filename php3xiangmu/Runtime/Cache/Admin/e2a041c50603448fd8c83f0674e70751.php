<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<title>管理中心</title>
<meta http-equiv=Content-Type content=text/html;charset=gb2312>
</head>
<frameset rows="64,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="/php3xiangmu/index.php/Admin/Index/admin_top/" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />
    <frameset cols="200,*"  rows="560,*" id="frame">
	<frame src="/php3xiangmu/index.php/Admin/Index/left/" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame src="/php3xiangmu/index.php/Admin/Index/right/" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
</frameset>
<noframes>
  <body></body>
</noframes>
</html>