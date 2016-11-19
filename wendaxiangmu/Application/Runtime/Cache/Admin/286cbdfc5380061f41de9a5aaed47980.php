<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        .open{
            display: block;
            width: 16px;
            height: 16px;
            line-height: 16px;
            text-align: center;
            border: 1px solid #00BF09;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            $("tr[pid != '0']").hide();
            $('.open').toggle(function(){
                var pid=$(this).parents('tr').attr('id');
                $(this).html('-');
                $('tr[pid='+pid+']').show()
            },function(){
                var pid=$(this).parents('tr').attr('id');
                $(this).html('+');
                $('tr[pid='+pid+']').hide()
            })
        })
    </script>
</head>
<body>	
<center>
		<table border="1" cellpadding="0" cellspacing="0" width="100%">
			<tr pid="0">
				<th width="5%" align="center" style="background: yellow;">展开</th>
				<th width="5%" align="center" style="background: yellow;" >ID</th>
                <th width="60%" align="center" style="background: yellow;">分类名称</th>
				<th width="30%" align="center" style="background: yellow;">操作</th>
			</tr>
			<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr align="center" id="<?php echo ($val["id"]); ?>" pid="<?php echo ($val["p_id"]); ?>">
                <td align="center" style="background:green;">
                    <a href="#"><font color="red"><span class="open">+</span></font></a></td>
                <td style="background:green;"><?php echo ($val["id"]); ?></td>
				<td align="left" style="background:green;"><?php echo ($val["html"]); echo ($val["c_name"]); ?></td>
				<td style="background:green;">
                    <a href="/wendaxiangmu/index.php/Admin/Category/addson/id/<?php echo ($val["id"]); ?>" class="son"><font color="red">添加子分类</font></a>
                    <a href="/wendaxiangmu/index.php/Admin/Category/cate/id/<?php echo ($val["id"]); ?>" class="son"><font color="red">修改</font></a>
                    <a href="/wendaxiangmu/index.php/Admin/Category/del/id/<?php echo ($val["id"]); ?>" class="son"><font color="red">删除</font></a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
</center>
</body>
</html>