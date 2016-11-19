<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- base href="http://localhost/wenda/admin.php" -->

</head>
<body>	
<center>
		<table border="1" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<th width="5%" align="center">展开</th>
				<th width="5%">ID</th>
				<th width="60%">分类名称</th>
				<th width="30%">操作</th>
			</tr>
			<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr align="center">
				<td height=40></td>
				<td><?php echo ($val["id"]); ?></td>
				<td align="left"><?php echo ($val["c_name"]); ?></td>
				<td><a href="" class="">添加子分类</a> <a href="" class="">修改</a> <a href="/wendaxiangmu/index.php/Admin/Index/del/id/<?php echo ($val["id"]); ?>" class="">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
</center>
</body>
</html>