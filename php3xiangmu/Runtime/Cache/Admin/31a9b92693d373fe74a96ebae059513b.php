<?php if (!defined('THINK_PATH')) exit();?><form action="/php3xiangmu/index.php/Admin/Index/newpwd" method="post">
    <center>
        <h3 style="color: red"><?php echo (session('username')); ?></h3>
        <h1 style="color: red">修改密码</h1>
    <table border="1">
        <tr>
            <td>旧密码</td>
            <td><input type="password" name="pwd1"/></td>
        </tr>
        <tr>
            <td>新密码</td>
            <td><input type="password" name="pwd2"/></td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="password" name="pwd3"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"/></td>
            <td></td>
        </tr>
    </table>
        </center>
</form>