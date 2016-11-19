<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="/power/tp/Public/Js/prototype.lite.js" type="text/javascript"></script>
    <script src="/power/tp/Public/Js/moo.fx.js" type="text/javascript"></script>
    <script src="/power/tp/Public/Js/moo.fx.pack.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/power/tp/Public/Style/skin.css" />
    <script type="text/javascript">
        window.onload = function () {
            var contents = document.getElementsByClassName('content');
            var toggles = document.getElementsByClassName('type');

            var myAccordion = new fx.Accordion(
            toggles, contents, {opacity: true, duration: 400}
            );
            myAccordion.showThisHideOpen(contents[0]);
            for(var i=0; i<document .getElementsByTagName("a").length; i++){
                var dl_a = document.getElementsByTagName("a")[i];
                    dl_a.onfocus=function(){
                        this.blur();
                    }
            }
        }
    </script>
</head>

<body>
    <table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
        <tr>
            <td width="182" valign="top">
                <div id="container">
                    <h1 class="type"><a href="javascript:void(0)">用户管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('User/add');?>" target="main">添加人员</a></li>
                           <!-- <li><a href="./cat_manage.html" target="main">人员职位添加</a></li>-->
                            <li><a href="<?php echo U('User/lst');?>" target="main">人员职位展示</a></li>
                           <!-- <li><a href="./cat_manage.html" target="main">人员职位变动</a></li>-->
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">角色管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Role/add');?>" target="main">角色添加</a></li>
                           <!-- <li><a href="./goods_add.html" target="main">角色权限展示</a></li>
                            <li><a href="./goods_list.html" target="main">角色权限变动</a></li>-->
                            <li><a href="<?php echo U('Role/lst');?>" target="main">角色列表展示</a></li>
                            <li><a href="<?php echo U('Role/allot_role');?>" target="main">用户角色</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">权限管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="<?php echo U('Privilege/Privilege');?>" target="main">添加权限</a></li>
                            <li><a href="<?php echo U('Privilege/lst');?>" target="main">权限展示</a></li>
                            <li><a href="<?php echo U('Privilege/allot_privilege');?>" target="main">分配权限</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">综合积分管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./mem_reg.html" target="main">积分修改</a></li>
                            <li><a href="./mem_chk.html" target="main">加减分查询</a></li>
                            <li><a href="./mem_add.html" target="main">积分管理</a></li>
                            <li><a href="./mem_list.html" target="main">积分查询</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">密码管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./sys.html" target="main">密码修改</a></li>
                            <li><a href="./admin.html" target="main">密保管理</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">班级管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">添加班级</a></li>
                            <li><a href="javascript:void(0)" target="main">班级查看</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">学生管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">学生添加</a></li>
                            <li><a href="javascript:void(0)" target="main">学生信息查看</a></li>
                            <li><a href="javascript:void(0)" target="main">学生请假申请</a></li>
                            <li><a href="javascript:void(0)" target="main">查看学生请假信息</a></li>
                            <li><a href="javascript:void(0)" target="main">学生请假审核</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">排课管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">排课添加</a></li>
                            <li><a href="javascript:void(0)" target="main">排课展示</a></li>
                            <li><a href="javascript:void(0)" target="main">排课审核</a></li>
                            <li><a href="javascript:void(0)" target="main">点名</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">课程管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">课程添加</a></li>
                            <li><a href="javascript:void(0)" target="main">课程展示</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">教师管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">教师添加</a></li>
                            <li><a href="javascript:void(0)" target="main">教师展示</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">日志列表</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">日志列表</a></li>
                            <li><a href="javascript:void(0)" target="main">日志清除</a></li>
                        </ul>
                    </div>
                </div>
              <!--  <div id="container">
                    <h1 class="type"><a href="javascript:void(0)">网站栏目</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./cat_add.html" target="main">添加栏目</a></li>
                            <li><a href="./cat_manage.html" target="main">栏目管理</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">产品管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./goods_sort.html" target="main">产品分类</a></li>
                            <li><a href="./goods_add.html" target="main">添加产品</a></li>
                            <li><a href="./goods_list.html" target="main">产品列表</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">订单管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./order_1.html" target="main">待处理订单</a></li>
                            <li><a href="./order_2.html" target="main">处理中订单</a></li>
                            <li><a href="./order_3.html" target="main">已发货订单</a></li>
                            <li><a href="./order_4.html" target="main">已完成订单</a></li>
                        </ul>
                    </div>
                    &lt;!&ndash; *********** &ndash;&gt;
                    <h1 class="type"><a href="javascript:void(0)">会员管理</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./mem_reg.html" target="main">注册设置</a></li>
                            <li><a href="./mem_chk.html" target="main">审核设置</a></li>
                            <li><a href="./mem_add.html" target="main">添加会员</a></li>
                            <li><a href="./mem_list.html" target="main">会员管理</a></li>
                        </ul>
                    </div>
                    <h1 class="type"><a href="javascript:void(0)">系统设置</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="./sys.html" target="main">网站设置</a></li>
                            <li><a href="./admin.html" target="main">管理员设置</a></li>
                            <li><a href="javascript:void(0)" target="main">模板设置</a></li>
                        </ul>
                    </div>
                    &lt;!&ndash; *********** &ndash;&gt;
                    <h1 class="type"><a href="javascript:void(0)">其它设置</a></h1>
                    <div class="content">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><img src="/power/tp/Public/Images/menu_top_line.gif" width="182" height="5" /></td>
                            </tr>
                        </table>
                        <ul class="RM">
                            <li><a href="javascript:void(0)" target="main">友情连接</a></li>
                            <li><a href="javascript:void(0)" target="main">在线留言</a></li>
                            <li><a href="javascript:void(0)" target="main">网站投票</a></li>
                            <li><a href="javascript:void(0)" target="main">邮箱设置</a></li>
                            <li><a href="javascript:void(0)" target="main">图片上传</a></li>
                        </ul>
                    </div>
                    &lt;!&ndash; *********** &ndash;&gt;
                </div>-->
            </td>
        </tr>
    </table>
</body>
</html>