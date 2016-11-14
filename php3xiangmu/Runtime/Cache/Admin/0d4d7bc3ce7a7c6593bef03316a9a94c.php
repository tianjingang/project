<?php if (!defined('THINK_PATH')) exit();?><form action="/php3xiangmu/index.php/Admin/Index/wmv_up" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>名字</td>
            <td><input type="text" name="w_name" value="<?php echo ($arr["w_name"]); ?>"/></td>
        </tr>
        <tr>
            <td>影视内容</td>
            <td><input type="file" name="w_wmv"/>
                <video src="/php3xiangmu<?php echo ($arr["w_wmv"]); ?>" controls autoplay width="200" height="100"></video>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo ($arr["id"]); ?>"/></td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>