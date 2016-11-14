<?php if (!defined('THINK_PATH')) exit();?><center>
<h1 style="color: red">评论回收站</h1>
<table border="1">
    <tr>
        <td>ID</td>
        <td>评论分数</td>
        <td>评论内容</td>
        <td>评论的电影名</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($val["id"]); ?></td>
            <td><?php echo ($val["ping_num"]); ?></td>
            <td><?php echo ($val["ping_han"]); ?></td>
            <td><?php echo ($val["ping_name"]); ?></td>
            <td><a href="/php3xiangmu/index.php/Admin/Index/ping_hf/id/<?php echo ($val["id"]); ?>">恢复</a>
                <a href="/php3xiangmu/index.php/Admin/Index/ping_del/id/<?php echo ($val["id"]); ?>">彻底删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
    </center>