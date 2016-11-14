<?php if (!defined('THINK_PATH')) exit();?><table>
	<tr>
		<td>编号</td>
		<td>用户名</td>
		<td>密码</td>
		<td>操作</td>
	</tr>
	<?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($val["id"]); ?></td>
			<td><?php echo ($val["username"]); ?></td>
			<td><?php echo ($val["pwd"]); ?></td>
			<td>
				<a href="">删除</a>
				<a href="/sanyue/ThinkPHP/index.php/Home/Index/show_one/id/<?php echo ($val["id"]); ?>">修改</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>