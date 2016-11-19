<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="问答 后盾问答 - 你问大家答">
	<meta name="description" content="">
	<link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/common.css">
	<script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/top-bar.js"></script>
	<link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/ask.css">
	<script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/send.js"></script>
	<script type="text/javascript">
		var getCate = '/wendaxiangmu/index.php/Home/Ask/lian';
		var on = false;
		var point = 0;
			</script>
</head>
<body>
	<div id="top-fixed">
	<div id="top-bar">
		<ul class="top-bar-left fl">
			<li><a href="http://www.houdunwang.com/" target="_blank">后盾网</a></li>
			<li><a href="http://bbs.houdunwang.com/" target="_blank">后盾论坛</a></li>
			<li><a href="http://study.houdunwang.com/" target="_blank">后盾学习社区</a></li>
		</ul>
        <?php if(isset($_SESSION['user'])): ?><ul class="top-bar-right fr">
                <li><a href="#" class="login"><?php echo (session('user')); ?></a></li>
                <li style="color:#eaeaf1">|</li>
                <li><a href="<?php echo U('Index/login_out');?>">退出</a></li>
            </ul>
            <?php else: ?>
            <ul class="top-bar-right fr">
                <li><a href="" class="login">登录</a></li>
                <li style="color:#eaeaf1">|</li>
                <li><a href="" class="register">注册</a></li>
            </ul><?php endif; ?>
    </div>
        <div id="search">
		<div class="logo"></div>
		<form action="" method="">
			<input name="" class="sech-cons" type="text">
			<input class="sech-btn" type="submit">
		</form>
		<a href="http://172.37.11.126/wenda/index.php/Ask/index" class="ask-btn"></a>
	</div>
</div>
<div style="height:110px"></div>
<!----------导航条---------->
<div id="nav">
	<ul class="list">
		<li class="nav-sel"><a href="http://172.37.11.126/wenda/index.php" class="home">问答首页</a></li>
		<li class="nav-sel ask-cate">
			<a href="http://172.37.11.126/wenda/index.php/List/index" class="ask-list"><span>问题分类</span><i></i></a>
			<ul class="hidden">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($val["c_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<p class="total">累计提问：10240000</p>
</div>

<script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/validate.js"></script>
	<script type="text/javascript">
		var CONTROL = "/wenda/index.php/Common/";
	</script>
	<!----------注册框---------->
	<div id="register" class="hidden">
		<div class="reg-title">
			<p>欢迎注册后盾问答</p>
			<a href="" title="关闭" class="close-window"></a>
		</div>
		<div id="reg-wrap">
			<div class="reg-left">
				<ul>
					<li><span>账号注册</span></li>
				</ul>
				<div class="reg-l-bottom">
					已有账号，<a href="" id="login-now">马上登录</a>
				</div>
			</div>
			<div class="reg-right">
				<form action="/wenda/index.php/Common/register" method="post" name="register">
					<ul>
						<li>
							<label for="reg-account">账号</label>
							<input name="account" id="reg-account" type="text">
							<span>7-20个字符：以字母开头的字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-uname">用户名</label>
							<input name="username" id="reg-uname" type="text">
							<span>2-14个字符：字母、数字或中文</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input name="pwd" id="reg-pwd" type="password">
							<span>6-20个字符:字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input name="pwded" id="reg-pwded" type="password">
							<span>请再次输入密码</span>
						</li>
						<li>
							<label for="reg-verify">验证码</label>
							<input name="verify" id="reg-verify" type="text">
							<img src="askd_files/verify.png" alt="验证码" id="verify-img" height="35" width="99">
							<span>请输入图中的字母或数字，不区分大小写</span>
						</li>
						<li class="submit">
							<input value="立即注册" type="submit">
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<!----------登录框---------->	
	<div id="login" class="hidden">
		<div class="login-title">
			<p>欢迎您登录后盾网</p>
			<a href="" title="关闭" class="close-window"></a>
		</div>
		<div class="login-form">
			<span id="login-msg"></span>
			<form action="/wenda/index.php/Common/login" method="post" name="login">
				<ul>
					<li>
						<label for="login-acc">账号</label>
						<input name="account" class="input" id="login-acc" type="text">
					</li>
					<li>
						<label for="login-pwd">密码</label>
						<input name="pwd" class="input" id="login-pwd" type="password">
					</li>
					<li class="login-auto">
						<label for="auto-login">
							<input checked="checked" name="auto" id="auto-login" type="checkbox">&nbsp;下一次自动登录
						</label>
						<a href="" id="regis-now">注册新账号</a>
					</li>
					<li>
						<input value="" id="login-btn" type="submit">
					</li>
				</ul>
			</form>
		</div>
	</div>
<!--背景遮罩--><div id="background" class="hidden"></div>
	<div id="location">
		<a href="http://172.37.11.126/wenda/index.php">后盾问答</a>&nbsp;&gt;&nbsp;提问
	</div>

<!--------------------中部-------------------->
    <div id="center">
		<div class="send">
			<div class="title">
				<p class="left">向后盾网友们提问</p>
				<p class="right">您还可以输入<span id="num">50</span>个字</p>
			</div>
			<form action="<?php echo U('Ask/send');?>" method="post">
				<div class="cons">
					<textarea name="content"></textarea>
				</div>
				<div class="reward">
                    <div id="cate" style="width: 330px;height:30px;float: left">
                    <select>
                        <option value="-1">请选择</option>
                        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>"><?php echo ($val["c_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    </div>
					<!--<span id="sel-cate" class="cate-btn">选择分类</span>-->
					<ul>
						<li>
                            我的金币<em class="gold">10</em>
													</li>
						<li>
							悬赏：<select name="gold">
								<option  value="00">0</option>
								<option  value="02">2</option>
								<option  value="04">4</option>
								<option  value="06">6</option>
								<option  value="08">8</option>
								<option  value="10">10</option>
								<option  value="12">12</option>
								<option  value="14">14</option>
								<option  value="16">16</option>
							</select>金币
						</li>
					</ul>
				</div>
				<input name="cid" value="0" type="hidden">
				<input value="提交问题" class="send-btn" type="submit">
			</form>
		</div>
	</div>
	<div id="category">
		<p class="title">
			<span>请选择分类</span>
			<a href="" class="close-window"></a>
		</p>
		<div class="sel">
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate-one" size="16">
                <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value=""></option><?php endforeach; endif; ?>
                <option value="1">电脑/网络</option><option value="2">手机/数码</option><option value="3">生活</option><option value="4">游戏</option><option value="5">体育/运动</option><option value="6">娱乐明星</option><option value="7">休闲爱好</option><option value="8">文化/艺术</option><option value="9">社会民生</option><option value="10">教育/科学</option><option value="11">健康/医疗</option><option value="12">商业/理财</option><option value="13">情感/家庭</option><option value="14">地区问题</option><option value="217">游戏</option><option value="218"></option><option value="219"></option><option value="220">wef</option><option value="225">小胖子</option><option value="228">这都是啥</option><option value="229">郑洪鑫上课又睡觉了</option><option value="232">他都没有醒过</option><option value="233">真的假的啊</option><option value="234">不说了小心老师知道了</option>			</select>
			<select name="cate-one" size="16" class="hidden"></select>
			<select name="cate-one" size="16" class="hidden"></select>
		</div>
		<p class="bottom">
			<span id="ok">确定</span>
		</p>
	</div>
<!--------------------中部结束-------------------->

	<div id="bottom">
		<p>Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
		<p>京ICP备10027771号-1</p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->

</body></html>