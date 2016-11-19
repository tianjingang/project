<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
<center>
<form action="/wendaxiangmu/index.php/Admin/User/show/" method="post">
    <table border="1">
        <tr>
            <td>ID</td>
            <td>账号</td>
            <td>用户名</td>
            <td>密码</td>
            <td>回答数</td>
            <td>采纳数</td>
            <td>提问数</td>
            <td>金币</td>
            <td>经验值</td>
            <td>最后登录时间</td>
            <td>最后登录IP</td>
            <td>注册时间</td>
            <td>账号状态</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($val["id"]); ?></td>
            <td><?php echo ($val["number"]); ?></td>
            <td><?php echo ($val["user"]); ?></td>
            <td><?php echo ($val["pwd1"]); ?></td>
            <td><?php echo ($val["answer"]); ?></td>
            <td><?php echo ($val["require"]); ?></td>
            <td><?php echo ($val["ask"]); ?></td>
            <td><?php echo ($val["gold"]); ?></td>
            <td><?php echo ($val["rich"]); ?></td>
            <td><?php echo ($val["logintime"]); ?></td>
            <td><?php echo ($val["loginip"]); ?></td>
            <td><?php echo ($val["registertime"]); ?></td>
            <td><a href="/wendaxiangmu/index.php/Admin/User/up1/id/<?php echo ($val["id"]); ?>">锁定</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</form>
</center>