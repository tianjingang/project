<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后盾问答</title>
    <meta name="keywords" content="问答 后盾问答 - 你问大家答">
    <meta name="description" content="">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/common.css">
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/top-bar.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/member.css">
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/Js/member.js"></script>
</head>
<body>
<div class="" id="top-fixed">
	<div id="top-bar">
		<ul class="top-bar-left fl">
			<li><a href="<?php echo U('Category/category');?>" target="_blank">后盾网</a></li>
			<li><a href="http://bbs.houdunwang.com/" target="_blank">后盾论坛</a></li>
			<li><a href="http://study.houdunwang.com/" target="_blank">后盾学习社区</a></li>
		</ul>

        <?php if(isset($_SESSION['user'])): ?><ul class="top-bar-right fr">
                <li>欢迎<span style="color:red"><?php echo (session('user')); ?></span>登录</li>
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
        <a href="<?php echo U('Ask/index');?>" class="ask-btn"></a>
	</div>
</div>
<div style="height:110px"></div>
<!----------导航条---------->
<div id="nav">
	<ul class="list">
        <?php $arr= M('Category')->where("p_id=0")->select(); ?>
		<li class="nav-sel"><a href="<?php echo U('Index/index');?>">问答首页</a></li>
		<li class="nav-sel ask-cate">
			<a href="<?php echo U('Category/category');?>" class="ask-list"><span>问题分类</span><i></i></a>
			<ul class="hidden">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($val["c_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
		</li>
	</ul>
	<p class="total">累计提问：10240000</p>
</div>
<script type="text/javascript" src="/wendaxiangmu/Public/Home/js/validate.js"></script> 
	<script type="text/javascript">
		var CONTROL = "/wendaxiangmu/index.php/Home/Common/";
		/*var check_verify = "/wendaxiangmu/index.php/Home/User/check_verify";*/ 
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
				<form action="<?php echo U('Common/register_do');?>" method="post" name="register">
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
							<img src="<?php echo U('Common/verify');?>" alt="验证码" id="verify-img" height="35" width="99">
							<!-- <a href="javascript:void(0);" id="verify-img" style="float:right">看不清 --></a>
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
			<form action="<?php echo U('Common/checkLogin');?>" method="post" name="login">
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
<!--背景遮罩-->

<?php $id=session('id'); $res=D('hd_user')->where("id='$id'")->find(); ?>
    <div id="center">
        <div id="left">
            <div class="userinfo">
                <dl>
                    <dt>
                        <a href=""><img src="/wendaxiangmu/Public/Home/Images/noface.gif" height="48" width="48"></a>
                    </dt>
                    <dd class='username'>
                        <a href="<?php echo U('User/self');?>"><b><?php echo (session('user')); ?></b>
                            <i class="level lv<?php echo ($res["suffer"]); ?>" title='Level <?php echo ($res["adopt"]); ?>'></i>
                        </a>
                    </dd>
                    <dd>金币：<a href="<?php echo U('User/gold');?>" style="color: #888888;"><b class='point'>
                        <?php echo ($res["point"]); ?>
                    </b></a></dd>
                    <dd>经验值：<?php echo ($res["exp"]); ?></dd>
                </dl>
                <table>
                    <tbody><tr>
                        <td>回答数</td>
                        <td>采纳率</td>
                        <td class="last">提问数</td>
                    </tr>
                    <tr>
                        <td><a href=""><?php echo ($res["answer"]); ?></a></td>
                        <td><a href="">0%</a></td>
                        <td class="last"><a href=""><?php echo ($res["ask"]); ?></a></td>
                    </tr>
                    </tbody></table>
            </div>
            <ul>
                <li class="myhome cur">
                    <a href="<?php echo U('User/self');?>">我的首页</a>
                </li>
                <li class="myask ">
                    <a href="<?php echo U('User/quiz');?>">我的提问</a>
                </li>
                <li class="myanswer ">
                    <a href="<?php echo U('User/answer');?>">我的回答</a>
                </li>
                <li class="mylevel ">
                    <a href="<?php echo U('User/suffer');?>">我的等级</a>
                </li>
                <li class="mypoint ">
                    <a href="<?php echo U('User/gold');?>">我的金币</a>
                </li>
                <li style="background:none"></li>
            </ul>
        </div>


<?php $id=session('id'); $res=D('hd_user')->where("id='$id'")->find(); $arr=array(C('LV1'),C('LV2'),C('LV3'),C('LV4'),C('LV5'),C('LV6'),C('LV7'),C('LV8'),C('LV9'),C('LV10'), C('LV11'),C('LV12'),C('LV13'),C('LV14'),C('LV15'),C('LV16'),C('LV17'),C('LV18'),C('LV19'),C('LV20'),); ?>
    <div id="right">
        <p class="title">TA的等级</p>
        <p class="lv-info">恭喜您，已经升到 <span><?php echo ($res["suffer"]); ?></span> 级啦，距下一级还需
            <span>6</span> 经验值!</p>
        <div class="lv-rule">
            <p><span>等级规则</span></p>
            <table class="lv-exp">
                <tbody><tr>
                    <th>等级</th>
                    <th>经验值</th>
                </tr>
               <?php foreach($arr as $k=>$v){ ?>
                <tr class="cur">
                    <td> <span><?php echo $k+1; ?></span></td>
                    <td> <span><?php echo $v; ?></span></td>
              </tr><?php } ?>
                </tbody></table>
        </div>
        <div class="lv-rule">
            <p><span>经验获取</span></p>
            <table class="lv-exp">
                <tbody><tr>
                    <th>操作</th>
                    <th>获得经验值</th>
                </tr>
                <tr>
                    <td>每天登录</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>提问</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>回答</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>采纳答案</td>
                    <td>5</td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>
<!--------------------中部结束-------------------->
<div id="bottom">
    <p>Copyright © 2013 houdunwang.Com All Rights Reserved 后盾网</p>
    <p>京ICP备10027771号-1</p>
</div>
<!--[if IE 6]>
<script type="text/javascript" src="/wenda/Public/Js/iepng.js"></script>
<script type="text/javascript">
    DD_belatedPNG.fix('.logo','background');
    DD_belatedPNG.fix('.nav-sel a','background');
    DD_belatedPNG.fix('.ask-cate i','background');
</script>
<![endif]-->

</body></html>