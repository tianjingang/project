<?php if (!defined('THINK_PATH')) exit();?><form action="/php3xiangmu/index.php/Admin/Index/photo_up" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>类型</td>
            <td><input type="text" name="v_type" value="<?php echo ($arr["v_type"]); ?>"/></td>
        </tr>
        <tr>
            <td>名字</td>
            <td><input type="text" name="v_name" value="<?php echo ($arr["v_name"]); ?>"/></td>
        </tr>
        <tr>
            <td>封面</td>
            <td><input type="file" name="photo"/>
                <img src="/php3xiangmu<?php echo ($arr["photo"]); ?>" width="100"/>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo ($arr["id"]); ?>"/></td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>