<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/power/tp/Public/Style/skin.css" />
</head>
    <body>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <!-- 头部开始 -->
            <tr>
                <td width="17" valign="top" background="/power/tp/Public/Images/mail_left_bg.gif">
                    <img src="/power/tp/Public/Images/left_top_right.gif" width="17" height="29" />
                </td>
                <td valign="top" background="/power/tp/Public/Images/content_bg.gif">
                    <table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" background=".//power/tp/Public/Images/content_bg.gif">
                        <tr><td height="31"><div class="title">添加栏目</div></td></tr>
                    </table>
                </td>
                <td width="16" valign="top" background="/power/tp/Public/Images/mail_right_bg.gif"><img src="/power/tp/Public/Images/nav_right_bg.gif" width="16" height="29" /></td>
            </tr>
            <!-- 中间部分开始 -->
            <tr>
                <!--第一行左边框-->
                <td valign="middle" background="/power/tp/Public/Images/mail_left_bg.gif">&nbsp;</td>
                <!--第一行中间内容-->
                <td valign="top" bgcolor="#F7F8F9">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <!-- 空白行-->
                        <tr><td colspan="2" valign="top">&nbsp;</td><td>&nbsp;</td><td valign="top">&nbsp;</td></tr>
                        <tr>
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td width="100" align="center"><img src="/power/tp/Public/Images/mime.gif" /></td>
                                        <td valign="bottom"><h3 style="letter-spacing:1px;">在这里，您可以根据您的需求，填写网站参数！</h3></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- 一条线 -->
                        <tr>
                            <td height="40" colspan="4">
                                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                                    <tr><td></td></tr>
                                </table>
                            </td>
                        </tr>
                        <!-- 添加栏目开始 -->
                        <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="96%">
                                <table width="100%">
                                    <tr>
                                        <td colspan="2">
                                            <!--<form action="" method="">
                                                <table width="100%"  class="cont tr_color">
                                                    <tr>
                                                        <th>排序</th>
                                                        <th>权限名称</th>
                                                        <th>权限地址</th>
                                                        <th>操作</th>
                                                    </tr>
                                                     <?php foreach($data as $v){?>
                                                    <tr align="center" class="d">
                                                        <td><?php echo $v['id']?></td>
                                                        <td align="left"><?php echo str_repeat('--',$v['lev']).$v['priname']?></td>
                                                        <td><?php echo $v['controllername'].'/'.$v['actionname']?></td>
                                                        <td><a href="/power/tp/index.php/Home/User/update/id/<?php echo $v['id']?>">编辑</a> <a href="/power/tp/index.php/Home/User/delete/id/<?php echo $v['id']?>">删除</a></td>
                                                    </tr>
                                                    <?php }?>
                                                </table>
                                            </form>-->
                                            <form>
                                                <table width="100%"  class="cont tr_color">
                                                    <tr>
                                                        <th>排序</th>
                                                        <th>用户名</th>
                                                        <th>密码</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><tr align="center" class="d">
                                                            <td><?php echo ($va["u_id"]); ?></td>
                                                            <td><?php echo ($va["u_name"]); ?></td>
                                                            <td><?php echo ($va["u_pass"]); ?></td>

                                                        <td><a href="/power/tp/index.php/Home/User/update/id/<?php echo $v['id']?>">编辑</a> <a href="/power/tp/index.php/Home/User/delete/id/<?php echo $v['id']?>">删除</a></td>


                                                       <!-- <td><span onclick="fun_text(this,<?php echo ($va["u_id"]); ?>)"><?php echo ($va["u_name"]); ?></span></td>
-->
                                                       <!-- <td> <a href="/power/tp/index.php/Home/User/delete/id/<?php echo $v['id']?>">删除</a></td>-->
                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </table>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="2%">&nbsp;</td>
                        </tr>
                        <!-- 添加栏目结束 -->
                        <tr>
                            <td height="40" colspan="4">
                                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                                    <tr><td></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="51%" class="left_txt">
                                <img src="/power/tp/Public/Images/icon_mail.gif" width="16" height="11"> 客户服务邮箱：rainman@foxmail.com<br />
                                <img src="/power/tp/Public/Images/icon_phone.gif" width="17" height="14"> 官方网站：<a href="http://www.rain-man.cn">http://www.rain-man.cn</a>
                            </td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td background="/power/tp/Public/Images/mail_right_bg.gif">&nbsp;</td>
            </tr>
            <!-- 底部部分 -->
            <tr>
                <td valign="bottom" background="/power/tp/Public/Images/mail_left_bg.gif">
                    <img src="/power/tp/Public/Images/buttom_left.gif" width="17" height="17" />
                </td>
                <td background="/power/tp/Public/Images/buttom_bgs.gif">
                    <img src="/power/tp/Public/Images/buttom_bgs.gif" width="17" height="17">
                </td>
                <td valign="bottom" background="/power/tp/Public/Images/mail_right_bg.gif">
                    <img src="/power/tp/Public/Images/buttom_right.gif" width="16" height="17" />
                </td>           
            </tr>
        </table>
    </body>
</html>
<!--
<script>
    function fun_text(obj,id){
        var connet=obj.innerHTML
        obj.parentNode.innerHTML="<input type='text' value='"+connet+"' onblur='fun_span(this,"+id+")'>"
    }
    function fun_span(obj,id){
        var connet=obj.value
        if(connet==''){
            alert('用户名不能为空')
            return false
        }
        var ajax=new XMLHttpRequest()
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4){
                if(ajax.responseText==1){
                    obj.parentNode.innerHTML="<span onclick='fun_text(this,"+id+")'>"+connet+"</span>";
                }else{
                    alert('用户名已经存在,或未知错误')
                }
            }
        }
        ajax.open('get','/power/tp/index.php/Home/User/click?id='+id+'&connet='+connet)
        ajax.send(null)

    }
</script>
-->