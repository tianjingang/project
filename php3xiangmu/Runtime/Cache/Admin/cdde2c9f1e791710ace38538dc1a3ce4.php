<?php if (!defined('THINK_PATH')) exit();?><center>
<form action="/php3xiangmu/index.php/Admin/Index/photo_res/" method="post" enctype="multipart/form-data">
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
            <td><img src="/php3xiangmu/<?php echo ($val["photo"]); ?>" width="80" height="80"/></td>
            <td>
                <a href="/php3xiangmu/index.php/Admin/Index/photo_resh/id/<?php echo ($val["id"]); ?>">恢复</a>
                <a href="/php3xiangmu/index.php/Admin/Index/photo_delete/id/<?php echo ($val["id"]); ?>">永久删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</form>
</center>