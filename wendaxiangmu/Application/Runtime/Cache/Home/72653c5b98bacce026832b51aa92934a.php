<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="问答 后盾问答 - 你问大家答">
    <meta name="description" content="">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/common.css">
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/js/top-bar.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Home/Css/index.css">
    <script type="text/javascript" src="/wendaxiangmu/Public/Home/js/index.js"></script>
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
			<ul style="display: none;" class="hidden">
                <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($val["c_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
		</li>
	</ul>
	<p class="total">累计提问：10240000</p>
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
                    <li>
							<a href="http://172.37.11.126/wenda/index.php/List/index/id/234">不说了小心老师知道了</a>
						</li>				</ul>
			</div>
			<div id="answer-list">
				<ul class="ans-sel">
					<li class="on">
						<a href="http://172.37.11.126/wenda/index.php/List/index/lists.html">待解决问题</a>
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
					<tr>
							<td class="t1 cons">
								<a href="http://172.37.11.126/wenda/index.php/Show/index/id/36">
									<b>5</b>loud tell me：谁最牛逼谁最火</a>&nbsp;&nbsp;[不说了小心老师知道了]
							</td>
							<td>1</td>
							<td>昨天22:53</td>
						</tr>
                    <tr>
							<td class="t1 cons">
								<a href="http://172.37.11.126/wenda/index.php/Show/index/id/8">
									后盾网论坛网址是什么？？？</a>&nbsp;&nbsp;[电脑/网络]
							</td>
							<td>1</td>
							<td>2013-05-03 15:58</td>
						</tr>					<tr class="page">
						<td colspan="3"> 4 条记录 1/1 页          </td>
					</tr>
				</tbody></table>
			</div>
		</div>

		<div id="right">
			<div class="userinfo">
			<dl>
				<dt>
					<a href="http://172.37.11.126/wenda/index.php/Member/index/id/17"><img src="list_files/noface.gif" height="48" width="48"></a>
				</dt>
				<dd class="username">
					<a href="http://172.37.11.126/wenda/index.php/Member/index/id/17"><b>佳人</b><i class="level lv1" title="Level 1"></i></a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class="point">0</b></a></dd>
				<dd>经验值：4</dd>
			</dl>
			<table>
				<tbody><tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class="last">提问数</td>
				</tr>
				<tr>
					<td><a href="">0</a></td>
					<td><a href="">0%</a></td>
					<td class="last"><a href="">2</a></td>
				</tr>
			</tbody></table>
			<ul>
				<li><a href="">我提问的</a></li>
				<li><a href="">我回答的</a></li>
			</ul>
		</div>
	<div class="clear"></div>
	<div class="star">
		<p class="title">后盾问答之星</p>
		<span class="star-name">本日回答问题最多的人</span>
					<div class="star-info">
				<div>
					<a href="http://172.37.11.126/wenda/index.php/Member/index/id/30" class="star-face"><img src="list_files/noface.gif" height="48px" width="48px"></a>
					<ul>
						<li><a href="http://172.37.11.126/wenda/index.php/Member/index/id/30">123123123</a></li>
						<li><i class="level lv3" title="Level 3"></i></li>
					</ul>
				</div>
				<ul class="star-count">
					<li>回答数：<span>12</span></li>
					<li>采纳率：<span>0%</span></li>
				</ul>
			</div>
		<span class="star-name">历史回答问题最多的人</span>
				<div class="star-info">
			<div>
				<a href="http://172.37.11.126/wenda/index.php/Member/index/id/30" class="star-face"><img src="list_files/noface.gif" height="48px" width="48px"></a>
				<ul>
					<li><a href="http://172.37.11.126/wenda/index.php/Member/index/id/30">123123123</a></li>
					<li><i class="level lv3" title="Level 3"></i></li>
				</ul>
			</div>
			<ul class="star-count">
				<li>回答数：<span>12</span></li>
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
						<a href="http://172.37.11.126/wenda/index.php/Member/index/id/9"><i class="rank r10"></i>刘宁</a>
						<span>4</span>
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