<?php if (!defined('THINK_PATH')) exit();?><form action="/php3xiangmu/index.php/Admin/Index/note/" method="post">
    <center>
        <h1 style="color: red">留言列表</h1>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>留言人</td>
            <td>邮箱</td>
            <td>手机号</td>
            <td>留言内容</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($val["id"]); ?></td>
            <td><?php echo ($val["name"]); ?></td>
            <td><?php echo ($val["e-mail"]); ?></td>
            <td><?php echo ($val["phone"]); ?></td>
            <td><?php echo ($val["message"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</form>
<?php echo ($show); ?>
</center>