<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Index/add');?>" method="post">
	<table>
		<tr>
			<td>用户名</td>
			<td><input type="text" name='username'></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name='pwd'></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="提交"></td>
		</tr>
	</table>
</form>