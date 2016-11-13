<?php 
	$myCartObj  = new Cart();
	$myCartInfo = $myCartObj->getMyCart();
	$siteConfig = new Config("site_config");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $siteConfig->name;?></title>
	<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/index.css";?>" />
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
	<script type='text/javascript' src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/site.js";?>'></script>
	<script type='text/javascript'>
		//用户中心导航条
		function menu_current()
		{
		    var current = "<?php echo $this->getAction()->getId();?>";
		    if(current == 'consult_old') current='consult';
		    else if(current == 'isevaluation') current ='evaluation';
		    else if(current == 'withdraw') current = 'account_log';
		    var tmpUrl = "<?php echo IUrl::creatUrl("/ucenter/current");?>";
		    tmpUrl = tmpUrl.replace("current",current);
		    $('div.cont ul.list li a[href^="'+tmpUrl+'"]').parent().addClass("current");
		}
	</script>
</head>
<body class="index">
<div class="ucenter container">
	<div class="header">
		<h1 class="logo"><a title="<?php echo $siteConfig->name;?>" style="background:url(<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/front/logo.gif";?>);" href="<?php echo IUrl::creatUrl("");?>"><?php echo $siteConfig->name;?></a></h1>
		<ul class="shortcut">
			<li class="first"><a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的账户</a></li><li><a href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a></li><li class='last'><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
		</ul>
		<p class="loginfo"><?php echo isset($this->user['username'])?$this->user['username']:"";?>您好，欢迎您来到<?php echo $siteConfig->name;?>购物！[<a class='reg' href="<?php echo IUrl::creatUrl("/simple/logout");?>">安全退出</a>]</p>
	</div>
	<div class="navbar">
		<ul>
			<li><a href="<?php echo IUrl::creatUrl("");?>">首页</a></li>
			<?php foreach(Api::run('getGuideList') as $key => $item){?>
			<li><a href="<?php echo IUrl::creatUrl("".$item['link']."");?>"><?php echo isset($item['name'])?$item['name']:"";?><span> </span></a></li>
			<?php }?>
		</ul>
		<div class="mycart">
			<dl>
				<dt><a href="<?php echo IUrl::creatUrl("/simple/cart");?>">购物车<b name="mycart_count"><?php echo isset($myCartInfo['count'])?$myCartInfo['count']:"";?></b>件</a></dt>
				<dd><a href="<?php echo IUrl::creatUrl("/simple/cart");?>">去结算</a></dd>
			</dl>

			<!--购物车浮动div 开始-->
			<div class="shopping" id='div_mycart' style='display:none;'>
			</div>
			<!--购物车浮动div 结束-->

			<!--购物车模板 开始-->
			<script type='text/html' id='cartTemplete'>
			<dl class="cartlist">
				<%for(var item in goodsData){%>
				<%var data = goodsData[item]%>
				<dd id="site_cart_dd_<%=item%>">
					<div class="pic f_l"><img width="55" height="55" src="<?php echo IUrl::creatUrl("")."<%=data['img']%>";?>"></div>
					<h3 class="title f_l"><a href="<?php echo IUrl::creatUrl("/site/products/id/<%=data['goods_id']%>");?>"><%=data['name']%></a></h3>
					<div class="price f_r t_r">
						<b class="block">￥<%=data['sell_price']%> x <%=data['count']%></b>
						<input class="del" type="button" value="删除" onclick="removeCart('<?php echo IUrl::creatUrl("/simple/removeCart");?>','<%=data['id']%>','<%=data['type']%>');$('#site_cart_dd_<%=item%>').hide('slow');" />
					</div>
				</dd>
				<%}%>

				<dd class="static"><span>共<b name="mycart_count"><%=goodsCount%></b>件商品</span>金额总计：<b name="mycart_sum">￥<%=goodsSum%></b></dd>

				<%if(goodsData){%>
				<dd class="static">
					<?php if(ISafe::get('user_id')){?>
					<a class="f_l" href="javascript:void(0)" onclick="deposit_ajax('<?php echo IUrl::creatUrl("/simple/deposit_cart_set");?>');">寄存购物车>></a>
					<?php }?>
					<label class="btn_orange"><input type="button" value="去购物车结算" onclick="window.location.href='<?php echo IUrl::creatUrl("/simple/cart");?>';" /></label>
				</dd>
				<%}%>
			</dl>
			</script>
			<!--购物车模板 结束-->

		</div>
	</div>

	<div class="searchbar">
		<div class="allsort">
			<a href="javascript:void();">全部商品分类</a>

			<!--总的商品分类-开始-->
			<ul class="sortlist" id='div_allsort' style='display:none'>
				<?php foreach(Api::run('getCategoryListTop') as $key => $first){?>
				<li>
					<h2><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$first['id']."");?>"><?php echo isset($first['name'])?$first['name']:"";?></a></h2>

					<!--商品分类 浮动div 开始-->
					<div class="sublist" style='display:none'>
						<div class="items">
							<strong>选择分类</strong>
							<?php foreach(Api::run('getCategoryByParentid',array('#parent_id#',$first['id'])) as $key => $second){?>
							<dl class="category selected">
								<dt>
									<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$second['id']."");?>"><?php echo isset($second['name'])?$second['name']:"";?></a>
								</dt>

								<dd>
									<?php foreach(Api::run('getCategoryByParentid',array('#parent_id#',$second['id'])) as $key => $third){?>
									<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$third['id']."");?>"><?php echo isset($third['name'])?$third['name']:"";?></a>|
									<?php }?>
								</dd>
							</dl>
							<?php }?>
						</div>
					</div>
					<!--商品分类 浮动div 结束-->
				</li>
				<?php }?>
			</ul>
			<!--总的商品分类-结束-->

		</div>

		<div class="searchbox">

			<form method='get' action='<?php echo IUrl::creatUrl("/");?>'>
				<input type='hidden' name='controller' value='site' />
				<input type='hidden' name='action' value='search_list' />
				<input class="text" type="text" name='word' autocomplete="off" value="输入关键字..." />
				<input class="btn" type="submit" value="商品搜索" onclick="checkInput('word','输入关键字...');" />
			</form>

			<!--自动完成div 开始-->
			<ul class="auto_list" style='display:none'></ul>
			<!--自动完成div 开始-->

		</div>
		<div class="hotwords">热门搜索：
			<?php foreach(Api::run('getKeywordList') as $key => $item){?>
			<?php $tmpWord = urlencode($item['word']);?>
			<a href="<?php echo IUrl::creatUrl("/site/search_list/word/".$tmpWord."");?>"><?php echo isset($item['word'])?$item['word']:"";?></a>
			<?php }?>
		</div>
	</div>

	<div class="position">
		您当前的位置： <a href="<?php echo IUrl::creatUrl("");?>">首页</a> » <a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的账户</a>
	</div>
	<div class="wrapper clearfix">
		<div class="sidebar f_l">
			<img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/front/ucenter/ucenter.gif";?>" width="180" height="40" />
			<div class="box">
				<div class="title"><h2>交易记录</h2></div>
				<div class="cont">
					<ul class="list">
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/integral");?>">我的积分</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/redpacket");?>">我的代金券</a></li>
                        <li><a href="<?php echo IUrl::creatUrl("/ucenter/invite");?>">邀请好友注册</a></li>
                        <li><a href="<?php echo IUrl::creatUrl("/update/vip");?>">升级vip</a></li>
                        <li><a href="<?php echo IUrl::creatUrl("/ucenter/seller");?>">升级商家</a></li>
					</ul>
				</div>
			</div>
			<div class="box">
				<div class="title"><h2 class='bg2'>服务中心</h2></div>
				<div class="cont">
					<ul class="list">
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/refunds");?>">退款申请</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/complain");?>">站点建议</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/consult");?>">商品咨询</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/evaluation");?>">商品评价</a></li>
					</ul>
				</div>
			</div>
			<div class="box">
				<div class="title"><h2 class='bg3'>应用</h2></div>
				<div class="cont">
					<ul class="list">
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/message");?>">短信息</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/favorite");?>">收藏夹</a></li>
					</ul>
				</div>
			</div>
			<div class="box">
				<div class="title"><h2 class='bg4'>账户资金</h2></div>
				<div class="cont">
					<ul class="list">
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/account_log");?>">帐户余额</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/online_recharge");?>">在线充值</a></li>
					</ul>
				</div>
			</div>
			<div class="box">
				<div class="title"><h2 class='bg5'>个人设置</h2></div>
				<div class="cont">
					<ul class="list">
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/address");?>">地址管理</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/info");?>">个人资料</a></li>
						<li><a href="<?php echo IUrl::creatUrl("/ucenter/password");?>">修改密码</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php $user_id = $this->user['user_id']?>
<?php $user = Api::run('getMemberInfo',$user_id)?>
<?php $statistics = Api::run('getMemberTongJi',$user_id)?>
<?php $msgObj = new Mess($user_id);$msgNum = $msgObj->needReadNum()?>
<?php $propIds = trim($user['prop'],',');$propIds = $propIds ? $propIds : 0?>
<?php $propData = Api::run('getPropTongJi',$propIds)?>
<div class="main f_r">
    <?php if($msgNum>0){?>
    <div class="prompt m_10">
        <b>温馨提示：</b>您有<span class="red"><?php echo isset($msgNum)?$msgNum:"";?></span> 条站内未读短信息，<a class="blue" href="<?php echo IUrl::creatUrl("/ucenter/message");?>">现在去看看</a>
    </div>
    <?php }?>

	<div class="userinfo_bar"><span class="f_r">上一次登录时间：<?php echo ISafe::get('last_login');?></span><b class="f14">您好，<?php echo isset($this->user['username'])?$this->user['username']:"";?> 欢迎回来!</b></div>
	<div class="box clearfix">
		<h3>用户信息</h3>
		<dl class="userinfo_box">
			<dt>
			<?php $user_ico = $this->user['head_ico']?>
			<a class="ico"><img id="user_ico_img" src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$user_ico."/w/100/h/100");?>" width="100" height="100" alt="" onerror="this.src='<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/front/user_ico.gif";?>'" /></a>
			<a class="blue" href="javascript:select_ico();">修改头像</a>
			</dt>
			<dd>
			<table width="100%" cellpadding="0" cellspacing="0">
				<col width="350px" />
				<col />
				<tr>
					<td>你的账户目前总积分：<b class="red2"><?php echo isset($user['point'])?$user['point']:"";?> 分</b>&nbsp;&nbsp;&nbsp;<a class="blue" href="<?php echo IUrl::creatUrl("/ucenter/integral");?>">查看积分历史</a></td>
					<td>你的订单交易总数量：<b class="red2"><?php echo isset($statistics['num'])?$statistics['num']:"";?> 笔</b>&nbsp;&nbsp;&nbsp;<a class="blue" href="<?php echo IUrl::creatUrl("/ucenter/order");?>">进入订单列表</a></td>
				</tr>
				<tr>
					<td>总消费额：<b class="red2">￥<?php echo isset($statistics['amount'])?$statistics['amount']:"";?></b></td>
					<td>预存款余额：<b class="red2">￥<?php echo isset($user['balance'])?$user['balance']:"";?></b></td>
				</tr>
				<tr>
					<td>代金券：<b class="red2"><?php echo isset($propData['prop_num'])?$propData['prop_num']:"";?> 张</b></td>
					<td></td>
				</tr>
			</table>

			<div class="stat">
				<span>待评价商品：<label>(<b><a class="red2" href="<?php echo IUrl::creatUrl("/ucenter/evaluation");?>"><?php echo statistics::countUserWaitComment($user_id);?></b>)</a></label></span>
				<span>待付款订单：<label>(<b><a class="red2" href="<?php echo IUrl::creatUrl("/ucenter/order");?>"><?php echo statistics::countUserWaitPay($user_id);?></b>)</a></label></span>
				<span>待确认收货：<label>(<b><a class="red2" href="<?php echo IUrl::creatUrl("/ucenter/order");?>"><?php echo statistics::countUserWaitCommit($user_id);?></b>)</a></label></span>
			</div>
			</dd>
		</dl>
	</div>
	<h3 class="bg">我的订单</h3>
	<div class="box m_10">
		<table class="list_table" width="100%" cellpadding="0" cellspacing="0">
			<col width="140px" />
			<tr>
				<th>订单编号</th><th>下单日期</th><th>收货人</th><th>支付方式</th><th>总金额</th><th>订单状态</th>
			</tr>
			<?php foreach(Api::run('getOrderListByUserid',array('#user_id#',$user['user_id'])) as $key => $item){?>
			<tr>
				<td><a href="<?php echo IUrl::creatUrl("/ucenter/order_detail/id/".$item['id']."");?>"><?php echo isset($item['order_no'])?$item['order_no']:"";?></a></td>
				<td><?php echo isset($item['create_time'])?$item['create_time']:"";?></td>
				<td><?php echo isset($item['accept_name'])?$item['accept_name']:"";?></td>
				<td><?php echo isset($this->payments[$item['pay_type']]['name'])?$this->payments[$item['pay_type']]['name']:"";?></td>
				<td>￥<?php echo ($item['order_amount']);?></td>
				<td>
					<?php $orderStatus = Order_Class::getOrderStatus($item)?>
					<b class="<?php if($orderStatus >= 6){?>green<?php }else{?>orange<?php }?>"><?php echo Order_Class::orderStatusText($orderStatus);?></b>
				</td>
			</tr>
			<?php }?>

			<tfoot><tr><td colspan="6" class="t_r"><a class="blue" href="<?php echo IUrl::creatUrl("/ucenter/order");?>">更多订单&gt;&gt;</a></td></tr></tfoot>
		</table>
	</div>
	<div class="box">
		<div class="title"><h2>也许你会对下列商品感兴趣</h2></div>
		<div class="cont clearfix">
			<ul class="prolist f_l">
				<?php foreach(Api::run('getGoodsByCommendgoods') as $key => $item){?>
				<li>
				<a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>" target="_black"><img src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$item['img']."/w/100/h/100");?>" alt="<?php echo isset($item['name'])?$item['name']:"";?>" height="100" width="100"></a>
				<p class="pro_title"><a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>" target='_black'><?php echo isset($item['name'])?$item['name']:"";?></a></p>
				<p class="price_new"><b>￥<?php echo isset($item['sell_price'])?$item['sell_price']:"";?></b></p>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
<script type='text/javascript'>
//选择头像
function select_ico()
{
	<?php $callback = urlencode(IUrl::creatUrl('/ucenter/user_ico_upload'))?>
	art.dialog.open('<?php echo IUrl::creatUrl("/block/photo_upload?callback=".$callback."");?>',
	{
		'id':'user_ico',
		'title':'设置头像',
		'ok':function(iframeWin, topWin)
		{
			iframeWin.document.forms[0].submit();
			return false;
		}
	});
}

//头像上传回调函数
function callback_user_ico(content)
{
	var content = eval(content);
	if(content.isError == true)
	{
		alert(content.message);
	}
	else
	{
		$('#user_ico_img').attr('src',content.data);
	}
	art.dialog({id:'user_ico'}).close();
}
</script>

	</div>

	<div class="help m_10">
		<div class="cont clearfix">
			<?php foreach(Api::run('getHelpCategoryFoot') as $key => $helpCat){?>
			<dl>
     			<dt><a href="<?php echo IUrl::creatUrl("/site/help_list/id/".$helpCat['id']."");?>"><?php echo isset($helpCat['name'])?$helpCat['name']:"";?></a></dt>
				<?php foreach(Api::run('getHelpListByCatidAll',array('#cat_id#',$helpCat['id'])) as $key => $item){?>
					<dd><a href="<?php echo IUrl::creatUrl("/site/help/id/".$item['id']."");?>"><?php echo isset($item['name'])?$item['name']:"";?></a></dd>
				<?php }?>
      		</dl>
      		<?php }?>
		</div>
	</div>
	<?php echo IFilter::stripSlash($siteConfig->site_footer_code);?>
</div>
<script type='text/javascript'>
//DOM加载完毕后运行
$(function()
{
	$(".tabs").each(function(i){
	    var parrent = $(this);
		$('.tabs_menu .node',this).each(function(j){
			var current=".node:eq("+j+")";
			$(this).bind('click',function(event){
				$('.tabs_menu .node',parrent).removeClass('current');
				$(this).addClass('current');
				$('.tabs_content>.node',parrent).css('display','none');
				$('.tabs_content>.node:eq('+j+')',parrent).css('display','block');
			});
		});
	});

	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	menu_current();

	$('input:text[name="word"]').bind({
		keyup:function(){autoComplete('<?php echo IUrl::creatUrl("/site/autoComplete");?>','<?php echo IUrl::creatUrl("/site/search_list/word/@word@");?>','<?php echo isset($siteConfig->auto_finish)?$siteConfig->auto_finish:"";?>');}
	});

	<?php $word = IReq::get('word') ? IFilter::act(IReq::get('word'),'text') : '输入关键字...'?>
	$('input:text[name="word"]').val("<?php echo isset($word)?$word:"";?>");

	//购物车div层
	$('.mycart').hover(
		function(){
			showCart('<?php echo IUrl::creatUrl("/simple/showCart");?>');
		},
		function(){
			$('#div_mycart').hide('slow');
		}
	);
});
</script>
</body>
</html>
