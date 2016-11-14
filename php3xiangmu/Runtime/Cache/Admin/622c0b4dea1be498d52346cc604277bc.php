<?php if (!defined('THINK_PATH')) exit();?><center>
<form action="/php3xiangmu/index.php/Admin/Index/wmv_add/" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>影视名称</td>
            <td><input type="text" name="w_name"/></td>
        </tr>
        <tr>
            <td>影视内容</td>
            <td><input type="file" name="w_wmv"/></td>
        </tr>
        <tr>
            <td>热度指数</td>
            <td><input type="text" name="w_row"/></td>
        </tr>
        <tr>
            <td>观看次数</td>
            <td><input type="text" name="w_count"/></td>
        </tr>
        <tr>
            <td>是否推荐</td>
            <td><input type="radio" name="w_controduct"  value="是"/>是
                <input type="radio" name="w_controduct"  value="否"/>否
            </td>
        </tr>
        <tr>
            <td>片长时间</td>
            <td><input type="text" name="w_time"/></td>
        </tr>
        <tr>
            <td>主演人</td>
            <td><input type="text" name="w_man"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="上传"/></td>
            <td></td>
        </tr>
    </table>
</form>
    </center>