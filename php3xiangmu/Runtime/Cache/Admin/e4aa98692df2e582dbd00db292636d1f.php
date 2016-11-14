<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理页面</title>

<script src="/php3xiangmu/Public/Admin/js/prototype.lite.js" type="text/javascript"></script>
<script src="/php3xiangmu/Public/Admin/js/moo.fx.js" type="text/javascript"></script>
<script src="/php3xiangmu/Public/Admin/js/moo.fx.pack.js" type="text/javascript"></script>
<style>
body {
	font:12px Arial, Helvetica, sans-serif;
	color: #000;
	background-color: #EEF2FB;
	margin: 0px;
}
#container {
	width: 182px;
}
H1 {
	font-size: 12px;
	margin: 0px;
	width: 182px;
	cursor: pointer;
	height: 30px;
	line-height: 20px;	
}
H1 a {
	display: block;
	width: 182px;
	color: #000;
	height: 30px;
	text-decoration: none;
	moz-outline-style: none;
	background-image: url(/php3xiangmu/Public/Admin/images/menu_bgS.gif);
	background-repeat: no-repeat;
	line-height: 30px;
	text-align: center;
	margin: 0px;
	padding: 0px;
}
.content{
	width: 182px;
	height: 26px;
	
}
.MM ul {
	list-style-type: none;
	margin: 0px;
	padding: 0px;
	display: block;
}
.MM li {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	list-style-type: none;
	display: block;
	text-decoration: none;
	height: 26px;
	width: 182px;
	padding-left: 0px;
}
.MM {
	width: 182px;
	margin: 0px;
	padding: 0px;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	clip: rect(0px,0px,0px,0px);
}
.MM a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/php3xiangmu/Public/Admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/php3xiangmu/Public/Admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
.MM a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/php3xiangmu/Public/Admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	font-weight: bold;
	color: #006600;
	background-image: url(/php3xiangmu/Public/Admin/images/menu_bg2.gif);
	background-repeat: no-repeat;
	text-align: center;
	display: block;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
</style>
</head>

<body>
<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
  <tr>
    <td width="182" valign="top"><div id="container">
      <h1 class="type"><a href="javascript:void(0)">登录管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/php3xiangmu/index.php/Admin/Index/setpwd/" target="main">修改密码</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/power/" target="main">头像设置</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/xinxi/" target="main">个人资料</a></li>
         <!-- <li><a href="http://www.865171.cn" target="main">114增加</a></li>
          <li><a href="http://www.865171.cn" target="main">114管理</a></li>
          <li><a href="http://www.865171.cn" target="main">联系方式</a></li>
          <li><a href="http://www.865171.cn" target="main">汇款方式</a></li>
          <li><a href="http://www.865171.cn" target="main">增加链接</a></li>
          <li><a href="http://www.865171.cn" target="main">管理链接</a></li>-->
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">电影分类</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/php3xiangmu/index.php/Admin/Index/Video/" target="main">分类添加</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/photo_show/" target="main">分类列表</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/photo_sou/" target="main">分页及搜索</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/photo_res/" target="main">回收站</a></li>
          <li><a target="main" href="/php3xiangmu/index.php/Admin/Index/photo_update/">删除及修改</a></li>
         <!-- <li><a href="http://www.865171.cn" target="main">商家类型</a></li>
          <li><a href="http://www.865171.cn" target="main">商家星级</a></li>
          <li><a href="http://www.865171.cn" target="main">商品分类</a></li>
          <li><a href="http://www.865171.cn" target="main">商品类型</a></li>-->
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">电影详情</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
            <li><a href="/php3xiangmu/index.php/Admin/Index/w_add/" target="main">电影添加</a></li>
		  <li><a href="/php3xiangmu/index.php/Admin/Index/wmv_show/" target="main">详情列表</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/wmv_fs/" target="main">分页及搜索</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/wmv_hs/" target="main">回收站</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/wmv_sx" target="main">删除及修改</a></li>
         <!-- <li><a href="http://www.865171.cn" target="main">热的指数列表</a></li>
          <li><a href="http://www.865171.cn" target="main">观看次数</a></li>
          <li><a href="http://www.865171.cn" target="main">是否推荐</a></li>
          <li><a href="http://www.865171.cn" target="main">偏长时间</a></li>
          <li><a href="http://www.865171.cn" target="main">主演人</a></li>-->
          <!--<li><a href="http://www.865171.cn" target="main">商品管理</a></li>
          <li><a href="http://www.865171.cn" target="main">商城留言</a></li>
          <li><a href="http://www.865171.cn" target="main">商城公告</a></li>-->
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">联系我们</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/php3xiangmu/index.php/Admin/Index/tell/" target="main">联系我们列表页面</a></li>
          <li><a href="/php3xiangmu/index.php/Admin/Index/note/" target="main">留言列表</a></li>
            <!-- <!-- <li><a href="http://www.865171.cn" target="main">回复管理</a></li>
              <li><a href="http://www.865171.cn" target="main">订单管理</a></li>
              <li><a href="http://www.865171.cn" target="main">举报管理</a></li>
              <li><a href="http://www.865171.cn" target="main">评论管理</a></li>-->
        </ul>
      </div>
        <h1 class="type"><a href="javascript:void(0)">评论评价</a></h1>
        <div class="content">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
                </tr>
            </table>
            <ul class="MM">
                <li><a href="/php3xiangmu/index.php/Admin/Index/ping_show" target="main">评论列表</a></li>
                <li><a href="/php3xiangmu/index.php/Admin/Index/hui/" target="main">评论回复</a></li>
                <li><a href="/php3xiangmu/index.php/Admin/Index/ping_hs" target="main">评论回收站</a></li>
                 <li><a href="/php3xiangmu/index.php/Admin/Index/ping_fs/" target="main">分页加搜索</a></li>
                 <!-- <li><a href="http://www.865171.cn" target="main">举报管理</a></li>
                 <li><a href="http://www.865171.cn" target="main">评论管理</a></li>-->
            </ul>
        </div>
    </div>
        <h1 class="type"><a href="javascript:void(0)">其它参数管理</a></h1>
      <div class="content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="/php3xiangmu/Public/Admin/images/menu_topline.gif" width="182" height="5" /></td>
            </tr>
          </table>
        <ul class="MM">
            <li><a href="http://www.865171.cn" target="main">管理设置</a></li>
          <li><a href="http://www.865171.cn" target="main">主机状态</a></li>
          <li><a href="http://www.865171.cn" target="main">攻击状态</a></li>
          <li><a href="http://www.865171.cn" target="main">登陆记录</a></li>
          <li><a href="http://www.865171.cn" target="main">运行状态</a></li>
        </ul>
      </div>
      </div>
        <script type="text/javascript">
		var contents = document.getElementsByClassName('content');
		var toggles = document.getElementsByClassName('type');
	
		var myAccordion = new fx.Accordion(
			toggles, contents, {opacity: true, duration: 400}
		);
		myAccordion.showThisHideOpen(contents[0]);
	</script>
        </td>
  </tr>
</table>
</body>
</html>