<?php if (!defined('THINK_PATH')) exit();?><center>
<form action="/php3xiangmu/index.php/Admin/Index/photo_update/" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <td>ID</td>
            <td>类型</td>
            <td>名字</td>
            <td>电影封面</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["v_type"]); ?></td>
                <td><?php echo ($val["v_name"]); ?></td>
                <td><img src="/php3xiangmu/<?php echo ($val["photo"]); ?>" height="80" width="80"/></td>
                <td><a href="/php3xiangmu/index.php/Admin/Index/photo_ress/id/<?php echo ($val["id"]); ?>">放入回收站</a>
                    <a href="/php3xiangmu/index.php/Admin/Index/photo_one/id/<?php echo ($val["id"]); ?>">修改</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</form>
<?php echo ($show); ?>
</center>