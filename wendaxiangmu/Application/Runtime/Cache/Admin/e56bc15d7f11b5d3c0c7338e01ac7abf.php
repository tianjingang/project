<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
<center>
    <form action="/wendaxiangmu/index.php/Admin/Level/upLevel/" method="post">

        <table border="1">
            <tr>
                <td>登录</td>
                <td><input type="text" name="LOGIN" value="<?php echo C('LOGIN');?>"/></td>
            </tr>
            <tr>
                <td>提问</td>
                <td><input type="text" name="ASK" value="<?php echo C('ASK');?>"/></td>
            </tr>
            <tr>
                <td>回答</td>
                <td><input type="text" name="ANSWER" value="<?php echo C('ANSWER');?>"/></td>
            </tr>
            <tr>
                <td>采纳</td>
                <td><input type="text" name="REQUIRE" value="<?php echo C('REQUIRE');?>"/></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td>LV1<input type="text" name="LV1" value="<?php echo C('LV1');?>"/></td>
                <td>LV2<input type="text" name="LV2" value="<?php echo C('LV2');?>"/></td>
                <td>LV3<input type="text" name="LV3" value="<?php echo C('LV3');?>" /></td>
                <td>LV4<input type="text" name="LV4" value="<?php echo C('LV4');?>"/></td>
            </tr>
            <tr>
                <td>LV5<input type="text" name="LV5" value="<?php echo C('LV5');?>"/></td>
                <td>LV6<input type="text" name="LV6" value="<?php echo C('LV6');?>"/></td>
                <td>LV7<input type="text" name="LV7" value="<?php echo C('LV7');?>"/></td>
                <td>LV8<input type="text" name="LV8" value="<?php echo C('LV8');?>"/></td>
            </tr>
            <tr>
                <td>LV9<input type="text" name="LV9" value="<?php echo C('LV9');?>"/></td>
                <td>LV10<input type="text" name="LV10" value="<?php echo C('LV10');?>"/></td>
                <td>LV11<input type="text" name="LV11" value="<?php echo C('LV11');?>"/></td>
                <td>LV12<input type="text" name="LV12" value="<?php echo C('LV12');?>"/></td>
            </tr>
            <tr>
                <td>LV13<input type="text" name="LV13" value="<?php echo C('LV13');?>"/></td>
                <td>LV14<input type="text" name="LV14" value="<?php echo C('LV14');?>"/></td>
                <td>LV15<input type="text" name="LV15" value="<?php echo C('LV15');?>"/></td>
                <td>LV16<input type="text" name="LV16" value="<?php echo C('LV16');?>"/></td>
            </tr>
            <tr>
                <td>LV17<input type="text" name="LV17" value="<?php echo C('LV17');?>"/></td>
                <td>LV18<input type="text" name="LV18" value="<?php echo C('LV18');?>"/></td>
                <td>LV19<input type="text" name="LV19" value="<?php echo C('LV19');?>"/></td>
                <td>LV20<input type="text" name="LV20" value="<?php echo C('LV20');?>"/></td>
            </tr>
        </table>
        <input type="submit" value="保存提交"/>
    </form>
</center>