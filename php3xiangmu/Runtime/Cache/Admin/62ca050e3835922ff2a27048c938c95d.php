<?php if (!defined('THINK_PATH')) exit();?>
    <table border="1">
        <tr>
            <td>序号</td>
            <td>影视名称</td>
            <td>影视内容</td>
            <td>热度指数</td>
            <td>观看次数</td>
            <td>是否推荐</td>
            <td>片长时间</td>
            <td>主演人</td>
            <td>操作</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["w_name"]); ?></td>
                <td><video src="/php3xiangmu<?php echo ($val["w_wmv"]); ?>" controls  width="200" height="100"></video>
                </td>
                <td><?php echo ($val["w_row"]); ?></td>
                <td><?php echo ($val["w_count"]); ?></td>
                <td><?php echo ($val["w_controduct"]); ?></td>
                <td><?php echo ($val["w_time"]); ?></td>
                <td><?php echo ($val["w_man"]); ?></td>
                <td><a href="/php3xiangmu/index.php/Admin/Index/wmv_fh/id/<?php echo ($val["id"]); ?>">放入回收站</a>
                <a href="/php3xiangmu/index.php/Admin/Index/wmv_one/id/<?php echo ($val["id"]); ?>">修改</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>


<?php echo ($show); ?>