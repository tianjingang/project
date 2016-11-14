<?php 
/**
 * 八维教育 高端PHP
 * @Author: BING
 * @Email: itbing@sina.cn
 */
require "../includes/init.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$cfg['sitename']?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
if(isset($_COOKIE['u_name'])){
    header('location:list.php');
}

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">用户登录</h3>
                    </div>
                    <div class="panel-body">
                        <?php show_alert($errmsg);?>
                        <form id="form1" action="pi.php" method="post" role="form" onsubmit="return checkAll()">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="txtUid" maxlength="16" class="form-control" placeholder="用户名"  onblur="checkUser()"/><span id="sp1"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtPwd" maxlength="16" class="form-control" placeholder="密码" onblur="checkPwd()" /><span id="sp2"></span>
                                </div>
                                <a id="btnLogin" href="#" class="btn btn-lg btn-success btn-block">登录</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="../bootstrap/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- MetisMenu CSS -->
<link href="../bootstrap/admin/metisMenu/metisMenu.min.js" rel="stylesheet">

<script type="text/javascript">
$(function ()
{
	$('#btnLogin').click(function() {
		$('#form1').submit();
	});
});
//验证用户名
    function checkUser(){
        var username=document.getElementsByName('txtUid')[0];
        var sp1=document.getElementById('sp1');
        if(username.value==''){
            sp1.innerHTML="不能为空";
            sp1.style.color="red";
            return false;
        }
        else{
            sp1.innerHTML="ok";
            sp1.style.color="red";
            return true;
        }
    }
    //验证密码
function checkPwd(){
    var pwd=document.getElementsByName('txtPwd')[0];
    var sp2=document.getElementById('sp2');
    if(pwd.value==''){
        sp2.innerHTML="不能为空";
        sp2.style.color="red";
        return false;
    }
    else{
        sp2.innerHTML="ok";
            sp2.style.color="red";
        return true;
    }
}
//验证所有
    function checkAll(){
        if(checkUser()&checkPwd()){
            return true;
        }
        else{
            return false;
        }
    }

</script>
</body>
</html>