<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
    <center>
        <form action="/wendaxiangmu/index.php/Admin/Window/upWindow/" method="post">
            <table border="1">
                <tr>
                    <td>网站名称</td>
                    <td><input type="text" name="WEDNAME" value="<?php echo C('WEDNAME');?>"/></td>
                </tr>
                <tr>
                    <td>网站关键字</td>
                    <td><input type="text" name="WEDKEY" value="<?php echo C('WEDKEY');?>"/></td>
                </tr>
                <tr>
                    <td>网站描述</td>
                    <td><input type="text" name="WEDSELF" value="<?php echo C('WEDSELF');?>"/></td>
                </tr>
                <tr>
                    <td>版权信息</td>
                    <td><input type="text" name="WEDPOWER" value="<?php echo C('WEDPOWER');?>"/></td>
                </tr>
                <tr>
                    <td>备案号</td>
                    <td><input type="text" name="WEDCOPY" value="<?php echo C('WEDCOPY');?>"/></td>
                </tr>
                <tr>
                    <td>是否开放注册</td>
                    <td>
                        <input type="radio" name="WEDOPEN" value="<?php echo C('WEDOPEN');?>" checked="checked"/>开放
                        <input type="radio" name="WEDOPEN" value="<?php echo C('WEDOPEN');?>"/>关闭</td>
                </tr>
               <!-- <tr>
                    <td>网站状态</td>
                    <td><input type="radio" name="WEDSTATUE" value="<?php echo C('WEDSTATUE');?>" checked="checked"/>开放
                        <input type="radio" name="WEDSTATUE" value="<?php echo C('WEDSTATUE');?>"/>维护中
                    </td>
                </tr>-->
                <tr>
                    <td>网站状态</td>
                    <?php if(C('WEDSTATUE') == 1): ?><td><input type="radio" name="WEDSTATUE" value="1" class='WEDSTATUE' checked/>开放
                        <input type="radio" name="WEDSTATUE" value="0" class='WEDSTATUE'/>维护中
                    </td>
                    <?php else: ?>
                    <td><input type="radio" name="WEDSTATUE" value="1" class='WEDSTATUE' />开放
                        <input type="radio" name="WEDSTATUE" value="0" checked class='WEDSTATUE'/>维护中
                    </td><?php endif; ?>
                </tr>
                <tr>
                    <td><input type="submit" value="保存修改"/></td>
                </tr>
            </table>
        </form>
    </center>