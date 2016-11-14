<?php if (!defined('THINK_PATH')) exit();?><form action="/sanyue/ThinkPHP/index.php/Home/Index/update/" method="post">
	<table>
		<tr>
			<td>用户名</td>
			<td><input type="text" name='username' value="<?php echo ($arr["username"]); ?>"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name='pwd' value="<?php echo ($arr["pwd"]); ?>"></td>
		</tr>
		<tr>
			<td><input type="hidden" name='id' value="<?php echo ($arr["id"]); ?>"></td>
			<td><input type="submit"></td>
		</tr>
	</table>
</form>