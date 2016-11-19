<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/shop/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/shop/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
    <script src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script>
        $(function(){
            //变换验证码
           $("#verify").click(function(){
                $(this).attr('src',"/shop/index.php/Admin/Login/yan/"+Math.random());
            });
            //验证用户名
            $("input[name='u_name']").blur(function(){
                $(this).next().remove();
                var u_name=$(this).val();
               if(u_name=="")
               {
                   $(this).after('<span>用户名不能为空</span>');
               }
            });
            //验证密码
            $("input[name='u_pwd']").blur(function(){
                $(this).next().remove();
                var u_pwd=$(this).val();
                if(u_pwd==""){
                    $(this).after("<span>密码不能为空</span>");
                }
            });
            //验证验证码
            $("input[name='code']").blur(function(){
                $(this).next().remove();
                var code=$(this).val();
                if(code==""){
                    $(this).after("<span>验证码不能为空</span>");
                }
            });
            //验证登录提交按钮
            $('.button').click(function(){
                $("input[name='u_name']").trigger('blur');
                $("input[name='u_pwd']").trigger('blur');
                $("input[name='code']").trigger('blur');
                //当都不为空的时候进行ajax传值
                if($('table span').length==0){
                   // alert(10);
                    $.ajax({
                        type:'post',
                        url:'/shop/index.php/Admin/Login/checklogin/',
                          data:({
                          u_name:$("input[name='u_name']").val(),
                            u_pwd:$("input[name='u_pwd']").val(),
                            code:$("input[name='code']").val(),
                            remember:$("input[name='remember']").attr('checked')
                        }),
                         success:function(data){

                            if(data=='0'){
                                alert('验证码不正确')
                            }
                            else if(data=='1'){
                                $(".tips").css({
                                    'position':'absolute',
                                    'top':($(window).height()-$('.tips').height())/2+'px',
                                    'left':($(window).width()-$('.tips').width())/2+'px',
                                    //延迟时间1秒半为上卷效果
                                }).show().delay(1500).slideUp();
                            }
                            else{
                                location.href="<?php echo U('Index/index1');?>";
                            }
                        }

                    })

                }
            });

        });
    </script>
<style type="text/css">
body {
  color: white;
}
</style>

</head>
<body style="background: #278296">
<table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
  <tr>
    <td><img src="images/login.png" width="178" height="256" border="0" alt="ECSHOP" /></td>
    <td style="padding-left: 50px">
      <table>
      <tr>
        <td>管理员姓名：</td>
        <td><input type="text" name="u_name" /></td>
      </tr>
      <tr>
        <td>管理员密码：</td>
        <td><input type="password" name="u_pwd" /></td>
      </tr>
      <tr>
        <td>验证码：</td>
        <td><input type="text" name="code" class="code" /></td>
      </tr>
      <tr>
      <td colspan="2" align="right">
          <img src="/shop/index.php/Admin/Login/yan" id="verify" style="cursor:pointer;" width="140" height="30" border="1" />
      </td>
      </tr>
      <tr><td colspan="2"><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember">请保存我这次的登录信息</label></td></tr>
      <tr><td>&nbsp;</td><td><input type="submit" value="进入管理中心" class="button" /></td></tr>
      <tr>
        <td colspan="2" align="right">&raquo; <a href="../" style="color:white">返回首页</a> &raquo; <a href="get_password.php?act=forget_pwd" style="color:white">你忘记了密码吗？</a></td>
      </tr>
      </table>
    </td>
  </tr>
  </table>
<div class="tips"style="width:300px;height:150px;border:dashed darkorange 3px;background:purple;display:none; font-color:red;">
    <p style="padding-top:40px;padding-left:84px;color:#68FF0E">用户名或密码不正确</p></div>

</body>