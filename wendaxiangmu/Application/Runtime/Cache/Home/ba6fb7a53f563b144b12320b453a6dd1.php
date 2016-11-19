<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="问答 后盾问答 - 你问大家答">
	<meta name="description" content="">
	<link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/common.css">
	<script type="text/javascript" src="/wendaxiangmu/Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/wendaxiangmu/Public/Home/js/top-bar.js"></script>
	<link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/list.css">
</head>
<body>
	<div id="top-fixed">
	<div id="top-bar">
		<ul class="top-bar-left fl">
			<li><a href="http://www.houdunwang.com/" target="_blank">后盾网</a></li>
			<li><a href="http://bbs.houdunwang.com/" target="_blank">后盾论坛</a></li>
			<li><a href="http://study.houdunwang.com/" target="_blank">后盾学习社区</a></li>
		</ul>
		<!--<ul class="top-bar-right fr">
			<li><a href="" class="login">登录</a></li>
				<li style="color:#eaeaf1">|</li>
				<li><a href="" class="register">注册</a></li>
					</ul>-->
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
		<a href="http://172.37.11.126/wenda/index.php/Ask/index" class="ask-btn"></a>
	</div>
</div>
<div style="height:110px"></div>
<!----------导航条---------->
<div id="nav">
	<ul class="list">
        <?php $arr= M('Category')->where("p_id=0")->select(); ?>
		<li class="nav-sel"><a href="<?php echo U('Index/index');?>">问答首页</a></li>
		<li class="nav-sel ask-cate">
			<a href="http://172.37.11.126/wenda/index.php/List/index" class="ask-list"><span>问题分类</span><i></i></a>
			<ul class="hidden">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Category/look',array('id'=>$v['child'][$i]['id']));?>"><?php echo ($val["c_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
		</li>
	</ul>
	<p class="total">累计提问：10240000</p>
</div>

<script type="text/javascript" src="/wendaxiangmu/Public/Home/js/validate.js"></script>
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
							<img src="category_files/verify.png" alt="验证码" id="verify-img" height="35" width="99">
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
		<a href="http://172.37.11.126/wenda/index.php/List/index">全部分类</a>
			</div>

<!--------------------中部-------------------->
	<div id="center">
		<div id="left">
			<div id="cate-list">
				<p class="title">按分类查找</p>
                <ul>
                    <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('Category/show',array('id'=>$val['id']));?>"><?php echo ($val["c_name"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div id="answer-list">
				<ul class="ans-sel">
					<li class="on">
						<a href="http://172.37.11.126/wenda/index.php/List/index/">待解决问题</a>
					</li>
					<li>
						<a href="http://172.37.11.126/wenda/index.php/List/index/filter/1">已解决</a>
					</li>
					<li>
						<a href="http://172.37.11.126/wenda/index.php/List/index/filter/2">高悬赏</a>
					</li>
					<li class="last ">
						<a href="http://172.37.11.126/wenda/index.php/List/index/filter/3">零回答</a>
					</li>
				</ul>
				<table>
					<tbody><tr>
						<th class="t1">标题</th>
						<th>回答数</th>
						<th>时间</th>
					</tr>
                    <?php $id=session('id'); $arr=M('hd_ask')->where("uid='$id'")->select(); ?>
                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <td style="float: left"><?php echo ($val["id"]); ?>:<?php echo ($val["content"]); ?><a href="">[<?php echo ($val["uid"]); ?>]</a></td>
                            <td></td>
                            <td style="float: right"><?php echo ($val["time"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--<tr>
							<td class="t1 cons">
								<a href="http://172.37.11.126/wenda/index.php/Show/index/id/8">
									后盾网论坛网址是什么？？？</a>&nbsp;&nbsp;[电脑/网络]
							</td>
							<td>1</td>
							<td>2013-05-03 15:58</td>
						</tr>	-->				<tr class="page">
						<td colspan="3"> 1 条记录 1/1 页          </td>
					</tr>
				</tbody></table>
			</div>
		</div>

		<div id="right">
            <div class="clear"></div>
	<div class="star">
		<p class="title">后盾问答之星</p>
		<span class="star-name">本日回答问题最多的人</span>
					<div class="star-info">
				<div>
					<a href="http://172.37.11.126/wenda/index.php/Member/index/" class="star-face"><img src="/wendaxiangmu/Public/Home/images/noface.gif" height="48px" width="48px"></a>
					<ul>
						<li><a href="http://172.37.11.126/wenda/index.php/Member/index/"></a></li>
						<li><i class="level lv1" title="Level 1"></i></li>
					</ul>
				</div>
				<ul class="star-count">
					<li>回答数：<span></span></li>
					<li>采纳率：<span>0%</span></li>
				</ul>
			</div>
		<span class="star-name">历史回答问题最多的人</span>
				<div class="star-info">
			<div>
				<a href="http://172.37.11.126/wenda/index.php/Member/index/" class="star-face"><img src="/wendaxiangmu/Public/Home/images/noface.gif" height="48px" width="48px"></a>
				<ul>
					<li><a href="http://172.37.11.126/wenda/index.php/Member/index/"></a></li>
					<li><i class="level lv1" title="Level 1"></i></li>
				</ul>
			</div>
			<ul class="star-count">
				<li>回答数：<span></span></li>
				<li>采纳率：<span>0%</span></li>
			</ul>
		</div>
	</div>


		<div class="star-list">
		<p class="title">后盾问答助人光荣榜</p>
		<div>
			<ul class="ul-title">
				<li>用户名</li>
				<li style="text-align:right;">帮助过的人数</li>
			</ul>
			<ul class="ul-list">
				<li>
						<a href="http://172.37.11.126/wenda/index.php/Member/index/id/1"><i class="rank r1"></i>后盾网</a>
						<span>3</span>
					</li><li>
						<a href="http://172.37.11.126/wenda/index.php/Member/index/id/2"><i class="rank r2"></i>后盾论坛</a>
						<span>1</span>
					</li><li>
						<a href="http://172.37.11.126/wenda/index.php/Member/index/id/3"><i class="rank r3"></i>后盾视频</a>
						<span>1</span>
					</li><li>
						<a href="http://172.37.11.126/wenda/index.php/Member/index/id/4"><i class="rank r4"></i>后盾学习社区</a>
						<span>0</span>
					</li>			</ul>
		</div>
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