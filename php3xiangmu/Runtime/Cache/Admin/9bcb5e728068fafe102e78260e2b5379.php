<?php if (!defined('THINK_PATH')) exit();?><center>
<h1 style="color: red">评论回复</h1>
<table border="1">
    <tr>
        <td>回复的内容</td>
        <td>回复的时间</td>
    </tr>
    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($val["hui_nei"]); ?></td>
        <td><?php echo ($val["hui_time"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
    <?php echo ($show); ?>
    </center>