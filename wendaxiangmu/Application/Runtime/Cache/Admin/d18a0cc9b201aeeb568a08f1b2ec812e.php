<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
    <center>
        <h1 style="color: #007AD0">所有问题</h1>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>内容</td>
                <td>类型</td>
            </tr>
            <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($val["id"]); ?></td>
                    <td><?php echo ($val["content"]); ?></td>
                    <td><?php echo ($val["uid"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </center>