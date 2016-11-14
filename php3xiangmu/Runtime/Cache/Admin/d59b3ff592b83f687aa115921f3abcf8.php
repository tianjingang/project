<?php if (!defined('THINK_PATH')) exit();?><center>
<form action="/php3xiangmu/index.php/Admin/Index/power_up/" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>原头像</td>
        <td><img src="/php3xiangmu<?php echo ($arr); ?>" width="30" height="30"/></td>
        </tr>
        <tr>
            <td>新头像</td>
            <td><input type="file" name="photo"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="上传头像"/></td>
        </tr>
    </table>
</form>
    </center>