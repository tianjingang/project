<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/login.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/login.js"></script>
		<script type="text/javascript">
			var CONTROL = '/wenda/admin.php/Login';
		</script>
		<script>
		var login_check = "/wendaxiangmu/index.php/Admin/Login/login_check";
		var check_verify = "/wendaxiangmu/index.php/Admin/Login/check_verify";
		</script>
	</head>
	<body>
		<div id="top">
        </div>
		<div class="login">	
            <div class="title">
				后盾问答 | 登录后台
			</div>
			<table border="1" width="100%">
				<tbody><tr>
					<th>管理员帐号:</th>
					<td>
						<input name="username" class="len250" type="username">
					</td>
				</tr>
				<tr>
					<th>密码:</th>
					<td>
						<input class="len250" name="password" type="password">
					</td>
				</tr>
				<tr>
					<th>验证码:</th>
					<td>
						<input class="len250" name="code" type="code"> <img src="/wendaxiangmu/index.php/Admin/Login/verify" id="code">
                        <a href="javascript:void(0);" id="codes">看不清</a>
                    </td>
				</tr>
				<tr>
					<td colspan="2" style="padding-left:160px;"> <input class="submit" value="登录" type="button"></td>
				</tr>
			</tbody></table>

		
	</div>
	
</body></html>
<!--<script>
    function change(){
        doucument.getElementById('obj').src="/wendaxiangmu/index.php/Admin/Login/verify/"+Math.random();
    }
</script>-->