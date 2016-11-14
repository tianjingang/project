<?php
/*header('content-type:text/html;charset=utf8');
if(empty($_COOKIE['txtUid'])){
    echo "<script>alert('请先登录');location.href='login.php'</script>";die;
}
*/?><!--
--><?php
/*//连接数据库
$username=$_COOKIE['txtUid'];
$link=mysql_connect('127.0.0.1','root','root') or die("连接数据库失败");
//选择数据库
mysql_select_db('php2',$link) or die("选择数据库失败");
$sql="select * from adds where  txtUid='$username'";
//echo $sql;die;
$er=mysql_query($sql);
$arr=mysql_fetch_assoc($er);
$is_admin=$arr['a_admin'];
//echo $is_admin;die;
if($is_admin!='1'){
    echo "<script>alert('你不是超级管理员');location.href='index.php'</script>";die;
}
*/?>
<?php
require "../includes/init.php";

?>
<?php require('top.php')?>

<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">会员管理</h3>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<form id="form1" action="insert.php" method="post" role="form" onsubmit="return checkall()">
<?php show_alert($errmsg, $alert_type);?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?=$title?>
        </div>
        <div class="panel-body">
            <div class="col-lg-6">

                <div class="form-group">
                    <label>帐号</label>
                    <input type="text" name="username" class="form-control"  onblur="checkusername()"/><span id="sp1"></span>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <input type="password" name="password" class="form-control" onblur="checkpwd()" /><span id="sp2"></span>
                </div>
                <div class="form-group">
                    <label>确认密码</label>
                    <input type="password" name="pwd2" class="form-control"  onblur="checkpwd2()" /><span id="sp3"></span>
                </div>

        <div class="form-group">
                    <label>电话</label>
                    <input type="text" name="tel" class="form-control" onblur="checktel()" /><span id="sp4"></span>
                </div>
        <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" name="email" class="form-control" onblur="checkemail()" /><span id="sp5"></span>
                </div>
        <div class="form-group">
                    <label>QQ</label>
                    <input type="text" name="qq" class="form-control"  onblur="checkqq()" /><span id="sp6"></span>
                </div>
                <div class="form-group">
                    <label>帐号类型</label>
                    <div class="checkbox">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="is_admin" value="1" /> 管理员
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="is_lock" value="1"  /> 锁定
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="　提交　" />
                <input id="btnClear" type="reset" class="btn btn-default" value="　重置　" />
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
<script>
   //验证账号
    function checkusername(){
        var username=document.getElementsByName('username')[0].value;
        if(username==""){
            document.getElementById('sp1').innerHTML='账号不能为空';
            document.getElementById('sp1').style.color="red";
            return false;
        }else{
            var reg=/^[\u4e00-\u9fa5]{2,5}$/;
            if(!reg.test(username)){
                document.getElementById('sp1').innerHTML='账号必须为2-5个汉字';
                document.getElementById('sp1').style.color="red";
                return false;
            }else{
                var xhr= new XMLHttpRequest();
                xhr.open('get','add_pro.php?username='+username);
                xhr.send(null);
                xhr.onreadystatechange=function(){
                    if(xhr.readyState==4&&xhr.status==200){
                        //alert(xhr.responseText);

                        if(xhr.responseText==1){
                            document.getElementById('sp1').innerHTML="账号可以使用";
                            document.getElementById('sp1').style.color="blue";
                            return true;
                        }else{
                            document.getElementById('sp1').innerHTML="账号已存在";
                            document.getElementById('sp1').style.color="red";
                            return false;
                        }

                    }
                }
            }return true;
        }
        return true;
    }

    //密码
    function checkpwd(){
        var password=document.getElementsByName('password')[0].value;
        if(password==""){
            document.getElementById('sp2').innerHTML='密码不能为空';
            document.getElementById('sp2').style.color="red";
            return false;
        }else{
            var reg=/^\d{5,10}$/;
            if(!reg.test(password)){
                document.getElementById('sp2').innerHTML='密码为5-10个数字';
                document.getElementById('sp2').style.color="red";
                return false;
            }else{
                document.getElementById('sp2').innerHTML='密码可以使用';
                document.getElementById('sp2').style.color="blue";
                return true;
            }
        }
        return true;
    }
    //确认密码
    function checkpwd2(){
        var pwd2=document.getElementsByName('pwd2')[0].value;
        var password=document.getElementsByName('password')[0].value;
        if(pwd2==""){
            document.getElementById('sp3').innerHTML='确认密码不能为空';
            document.getElementById('sp3').style.color="red";
            return false;
        }else{
            if(pwd2!=password){
                document.getElementById('sp3').innerHTML='两次密码输入不一致';
                document.getElementById('sp3').style.color="red";
                return false;
            }else{
                document.getElementById('sp3').innerHTML='确认密码可以使用';
                document.getElementById('sp3').style.color="blue";
                return true;
            }
        }
        return true;
    }
    //验证电话
   function checktel(){
       var tel=document.getElementsByName('tel')[0].value;
       if(tel==""){
           document.getElementById('sp4').innerHTML='电话不能为空';
           document.getElementById('sp4').style.color="red";
           return false;
       }else{

           var reg=/^1\d{10}$/;
           if(!reg.test(tel)){
               document.getElementById('sp4').innerHTML='手机号必须为以1开头的11位数字';
               document.getElementById('sp4').style.color="red";
               return false;
           }else{
               document.getElementById('sp4').innerHTML='手机号码可以使用';
               document.getElementById('sp4').style.color="blue";
               return true;
           }
       }
       return true;
   }
    //验证邮箱
   function checkemail(){
       var email=document.getElementsByName('email')[0].value;
       if(email==""){
           document.getElementById('sp5').innerHTML='邮箱不能为空';
           document.getElementById('sp5').style.color="red";
           return false;
       }else{

           var reg=/^\w+@\w+[.](con|com|cn)$/;
           if(!reg.test(email)){
               document.getElementById('sp5').innerHTML='邮箱不合法';
               document.getElementById('sp5').style.color="red";
               return false;
           }else{
               document.getElementById('sp5').innerHTML='邮箱可以使用';
               document.getElementById('sp5').style.color="blue";
               return true;
           }
       }
       return true;
   }
    //验证QQ
    function checkqq(){
        var qq=document.getElementsByName('qq')[0];
        var sp6=document.getElementById('sp6');
        if(qq.value==''){
            sp6.innerHTML="不能为空";
            sp6.style.color="red";
            return false;
        }
        else{
            sp6.innerHTML="ok";
            sp6.style.color="red";
            return true;
        }
    }
   function checkqq(){
       var qq=document.getElementsByName('qq')[0].value;
       if(qq==""){
           document.getElementById('sp6').innerHTML='QQ号不能为空';
           document.getElementById('sp6').style.color="red";
           return false;
       }else{

           var reg=/^\d{6,11}$/;
           if(!reg.test(qq)){
               document.getElementById('sp6').innerHTML='QQ号码为6-11位纯数字';
               document.getElementById('sp6').style.color="red";
               return false;
           }else{
               document.getElementById('sp6').innerHTML='QQ号码可以使用';
               document.getElementById('sp6').style.color="blue";
               return true;
           }
       }
       return true;
   }
    function checkall(){
        if(checkusername()&checkpwd()&checkpwd2()&checktel()&checkemail()&checkqq()){
            return true;
        }
        else{
            return false;
        }
    }
</script>
