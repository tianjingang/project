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
                <tr><td height="31"><div class="title">添加权限</div></td></tr>
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
                                    <form action="<?php echo U('Privilege/add_privilege');?>" method="post">
                                        <table width="100%" class="cont">
                                            <tr>
                                                <td width="2%">&nbsp;</td>
                                                <td>权限名：</td>
                                                <td width="90%"><input class="text" type="text" name="p_name" value="" /></td>
                                            </tr>
                                            <input type="hidden" name="id" value="234455"/>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="3"><input class="btn" type="submit" value="提交" /></td>
                                                <td>&nbsp;</td>
                                            </tr>
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