<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>ShopCZ-首页</title>
	<link rel="stylesheet" href="/shop/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/Home/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/shop/Public/Home/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/shop/Public/Home/js/jquery.js" ></script>
        <script type="text/javascript" src="/shop/Public/Home/js/topNav.js" ></script>
        <script type="text/javascript" src="/shop/Public/Home/js/focus.js" ></script>
        <script type="text/javascript" src="/shop/Public/Home/js/shop_home_tab.js" ></script>
</head>
<body>
	<!-- Header  -wll-2013/03/24 -->
	<div class="shop_hd">
		<!-- Header TopNav -->
		<div class="shop_hd_topNav">
			<div class="shop_hd_topNav_all">
				<!-- Header TopNav Left -->
				<div class="shop_hd_topNav_all_left">
                <?php if(isset($_SESSION['u_name'])): echo (session('u_name')); ?>您好，欢迎来到Buy+商城
                    <a href="<?php echo U('Login/login_out');?>">退出</a>
                    <?php else: ?>
                    <p>您好，欢迎来到<b><a href="/">ShopCZ商城</a></b>[<a href="<?php echo U('Login/login');?>">登录</a>][<a href="<?php echo U('Register/register');?>">注册</a>]</p><?php endif; ?>

                </div>
				<!-- Header TopNav Left End -->

				<!-- Header TopNav Right -->
				<div class="shop_hd_topNav_all_right">
					<ul class="topNav_quick_menu">

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">我的商城<i></i></a>
								<div class="topNav_menu_bd" style="display:none;" >
						            <ul>
						              <li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
						              <li><a title="个人主页" target="_top" href="#">个人主页</a></li>
						              <li><a title="我的好友" target="_top" href="#">我的好友</a></li>
						            </ul>
						        </div>
							</div>
						</li>
                                                <li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">卖家中心<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
						            <ul>
						              <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
						              <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
						            </ul>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">购物车<b>0</b>种商品<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
									<!--
						            <ul>
						              <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
						              <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
						            </ul>
						        	-->
						            <p>还没有商品，赶快去挑选！</p>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#" class="topNavHover">我的收藏<i></i></a>
								<div class="topNav_menu_bd" style="display:none;">
						            <ul>
						              <li><a title="收藏的商品" target="_top" href="#">收藏的商品</a></li>
						              <li><a title="收藏的店铺" target="_top" href="#">收藏的店铺</a></li>
						            </ul>
						        </div>
							</div>
						</li>

						<li>
							<div class="topNav_menu">
								<a href="#">站内消息</a>
							</div>
						</li>

					</ul>
				</div>
				<!-- Header TopNav Right End -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<!-- Header TopNav End -->

		<!-- TopHeader Center -->
		<div class="shop_hd_header">
			<div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/shop/Public/Home/images/logo.png" alt="ShopCZ" /></a></h1></div>
			<div class="shop_hd_header_search">
                            <ul class="shop_hd_header_search_tab">
			        <li id="search" class="current">商品</li>
			        <li id="shop_search">店铺</li>
			    </ul>
                            <div class="clear"></div>
			    <div class="search_form">
			    	<form method="post" action="index.php">
			    		<div class="search_formstyle">
			    			<input type="text" class="search_form_text" name="search_content" value="搜索其实很简单！" />
			    			<input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
			    		</div>
			    	</form>
			    </div>
                            <div class="clear"></div>
			    <div class="search_tag">
			    	<a href="">李宁</a>
			    	<a href="">耐克</a>
			    	<a href="">Kappa</a>
			    	<a href="">双肩包</a>
			    	<a href="">手提包</a>
			    </div>

			</div>
		</div>
		<div class="clear"></div>
		<!-- TopHeader Center End -->

		<!-- Header Menu -->
		<div class="shop_hd_menu">
			<!-- 所有商品菜单 -->
                        
			<div class="shop_hd_menu_all_category shop_hd_menu_hover"><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
				<div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
				<div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
					<ul class="shop_hd_menu_all_category_hd_menu clearfix">
                       <!-- <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class='list-l1'>
                                <div class='list-l1-wrap'>
                                    <h4><a href="<?php echo U('Index/index',array('id'=>$val['c_id']));?>"><?php echo ($val["c_type"]); ?></a></h4>
                                    <dl class='list-l2'>
                                        <?php $__FOR_START_27611__=0;$__FOR_END_27611__=3;for($i=$__FOR_START_27611__;$i < $__FOR_END_27611__;$i+=1){ ?><li><a href="<?php echo U('Index/index',array('id'=>$val['child'][$i]['c_id']));?>"><?php echo ($val['child'][$i]['c_type']); ?></a></li><?php } ?>
                                    </dl>
                                </div>

                                <div class='list-more hidden'>
                                    <dl>
                                        <?php $__FOR_START_22136__=3;$__FOR_END_22136__=count($val["child"]);for($i=$__FOR_START_22136__;$i < $__FOR_END_22136__;$i+=1){ ?><li><a href="<?php echo U('Index/index',array('id'=>$v['child'][$i]['c_id']));?>"><?php echo ($val['child'][$i]['c_type']); ?></a></li><?php } ?>
                                    </dl>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>-->
						<!-- 单个菜单项 -->
						<li id="cat_1" class="">
							<h3><a href="" title="男女服装">男女服装</a></h3>
							<div id="cat_1_menu" class="cat_menu clearfix" style="">
								<dl class="clearfix">
									<dt><a href="女装" href="">女装</a></dt>
									<dd>
										<a href="">风衣</a>
										<a href="">长袖连衣裙</a>
										<a href="">毛呢连衣裙</a>
										<a href="">半身裙</a>
										<a href="">小脚裤</a>
										<a href="">加绒打底裤</a>
										<a href="">牛仔裤</a>
										<a href="">打底衫</a>
										<a href="">情侣装</a>
										<a href="">棉衣</a>
										<a href="">毛呢大衣</a>
                                        <a href="">毛呢短裤</a>
									</dd>
								</dl>
                            </div>
						</li>
						<!-- 单个菜单项 End -->
                                                <li id="cat_2" class="">
                                                </li>
                                                <li class="more"><a href="">查看更多分类</a></li>
					</ul>
				</div>
			</div>
			<!-- 所有商品菜单 END -->

			<!-- 普通导航菜单 -->
			<ul class="shop_hd_menu_nav">
				<li class="current_link"><a href=""><span>首页</span></a></li>
				<li class="link"><a href=""><span>团购</span></a></li>
				<li class="link"><a href=""><span>品牌</span></a></li>
				<li class="link"><a href=""><span>优惠卷</span></a></li>
				<li class="link"><a href=""><span>积分中心</span></a></li>
				<li class="link"><a href=""><span>运动专场</span></a></li>
				<li class="link"><a href=""><span>微商城</span></a></li>
			</ul>
			<!-- 普通导航菜单 End -->
		</div>
		<!-- Header Menu End -->



	</div>
	<div class="clear"></div>
	<!-- Header End -->
	

	<!-- Body -wll-2013/03/24 -->
	<div class="shop_bd clearfix">
            <!-- 第一块区域  -->
            <div class="shop_bd_top clearfix">
                <div class="shop_bd_top_left"></div>
                <div class="shop_bd_top_center">
                    <!-- 图片切换  begin  -->
                    <div class="xifan_sub_box">
                      <div id="p-select" class="sub_nav"><div class="sub_no" id="xifan_bd1lfsj"> <ul></ul></div></div>
                      <div id="xifan_bd1lfimg">
                        <div>
                          <dl class=""></dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/e2dfe57add8fff66ed0964b1effd39b9.jpg" alt="2011城市主题公园亲子游"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">2011城市主题公园亲子游</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/e50b5d398e3b890f08e14defbc71a94d.jpg" alt="潜入城市周边清幽之地"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">潜入城市周边清幽之地</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/196b173f15685a2019ab3396cd1851a4.jpg" alt="盘点中国最美雪山"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">盘点中国最美雪山</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/e81345cbc3d8a7e11f9a0e09df68221d.jpg" alt="2011西安世园会攻略"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">2011西安世园会攻略</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/65662b58848da87812ba371c7ff6c1ad.jpg" alt="五月乐享懒人天堂塞班岛"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">五月乐享懒人天堂塞班岛</a></h2></dd>
                          </dl>

                                  <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/e50b5d398e3b890f08e14defbc71a94d.jpg" alt="潜入城市周边清幽之地"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">潜入城市周边清幽之地</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/196b173f15685a2019ab3396cd1851a4.jpg" alt="盘点中国最美雪山"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">盘点中国最美雪山</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/e81345cbc3d8a7e11f9a0e09df68221d.jpg" alt="2011西安世园会攻略"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">2011西安世园会攻略</a></h2></dd>
                          </dl>
                          <dl class="">
                            <dt><a href="http://www.zztuku.com" title="" target="_blank"><img src="/shop/Public/Home/images/65662b58848da87812ba371c7ff6c1ad.jpg" alt="五月乐享懒人天堂塞班岛"></a></dt>
                            <dd><h2><a href="http://www.zztuku.com" target="_blank">五月乐享懒人天堂塞班岛</a></h2></dd>
                          </dl>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">movec();</script> 
                    <!-- 图片切换  end --> 
                    <div class="clear"></div>
                    <div class="shop_bd_top_center_hot"><img src="/shop/Public/Home/images/index.guanggao.png" /></div>
                </div>
                
                <!-- 右侧 -->
                <div class="shop_bd_top_right clearfix">
                    <div class="shop_bd_top_right_quickLink">
                        <a href="<?php echo U('Login/login');?>" class="login" title="会员登录"><i></i>会员登录</a>
                        <a href="<?php echo U('Register/register');?>" class="register" title="免费注册"><i></i>免费注册</a>
                        <a href="" class="join" title="商家开店" ><i></i>帮助中心</a>
                    </div>
                    
                    <div class="shop_bd_top_right-style1 nc-home-news">
                        <ul class="tabs-nav">
                            <li><a href="javascript:void(0);" class="hover">商城广告</a></li>
                            <li><a href="javascript:void(0);">关于我们</a></li>
                        </ul>
                        <div class="clear"></div>
                        <div class="tabs-panel">
                            <ul class="list-style01">
                                <li><a title="如何申请开店" href="article-15.html">如何申请开店</a><span>(2011-01-11)</span></li>
                                <li><a title="商城商品推荐" href="article-14.html">商城商品推荐</a><span>(2011-01-11)</span></li>
                                <li><a title="如何发货" href="article-13.html">如何发货</a><span>(2011-01-11)</span></li>
                                <li><a title="查看售出商品" href="article-12.html">查看售出商品</a><span>(2011-01-11)</span></li>
                                <li><a title="如何管理店铺" href="article-11.html">如何管理店铺</a><span>(2011-01-11)</span></li>
                                <li><a title="如何申请开店" href="article-15.html">如何申请开店</a><span>(2011-01-11)</span></li>
                                <li><a title="商城商品推荐" href="article-14.html">商城商品推荐</a><span>(2011-01-11)</span></li>
                                <li><a title="如何发货" href="article-13.html">如何发货</a><span>(2011-01-11)</span></li>
                                <li><a title="查看售出商品" href="article-12.html">查看售出商品</a><span>(2011-01-11)</span></li>
                                <li><a title="如何管理店铺" href="article-11.html">如何管理店铺</a><span>(2011-01-11)</span></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- 右侧 End -->
            </div>
            <div class="clear"></div>
            <!-- 第一块区域 End -->
            
            <!-- 第二块区域 -->
            <div class="shop_bd_2 clearfix">
                <!-- 特别推荐 -->
                <div class="shop_bd_tuijian">
                    <ul class="tuijian_tabs">
                        <li class="hover"  onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;" id="tuijian_content_btn_1"><a href="javascript:void(0);">特别推荐</a></li>
                        <li onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;" id="tuijian_content_btn_2" ><a href="javascript:void(0);">热门商品</a></li>
                        <li onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');" onclick="return false;" id="tuijian_content_btn_3"><a href="javascript:void(0);">新品上架</a></li>
                    </ul>
                    <div class="tuijian_content">
                        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
                            <ul>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">11111111棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div id="tuijian_content_2" class="tuijian_shangpin">
                            <ul>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">2222222棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                            </ul>
                        </div>
                        <div id="tuijian_content_3" class="tuijian_shangpin tuijian_content">
                            <ul>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">3333333全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                                <li>
                                    <dl>
                                        <dt><a href=""><img src="/shop/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                                        <dd><a href="">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                                        <dd> 商城价：<em>256.00</em>元</dd>
                                    </dl>
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>

                </div>
                <!-- 特别推荐 End -->
                
                <!-- 首发 -->
                <div class="shop_bd_shoufa"><img src="/shop/Public/Home/images/shoufa.jpg" /></div>
                <!-- 首发 End -->
                
            </div>
            <div class="clear"></div>
            <!-- 第二块区域 End -->
            
            <!-- 第三块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">
                
                <!-- 左边 -->
                <div class="shop_bd_home_block_left">
                    <div class="shop_bd_home_block_left_logo block_nvzhuang_logo"></div>
                    <div class="shop_hd_home_block_left_class clearfix">
                        <dl class="clearfix">
                            <dt>女装</dt>
                            <dd>
                                <a href="">棉衣</a>
                                <a href="">毛呢大衣</a>
                                <a href="">风衣</a>
                                <a href="">打底衫</a>
                                <a href="">情侣装</a>
                                <a href="">毛呢短裤</a>
                                <a href="">牛仔裤</a>
                                <a href="">加绒打...</a>
                                <a href="">小脚裤</a>
                                <a href="">半身裙</a>
                            </dd>
                        </dl>
                        
                        <dl class="clearfix">
                            <dt>男装</dt>
                            <dd>
                                <a href="">羽绒服</a>
                                <a href="">卫衣</a>
                                <a href="">长袖T桖</a>
                                <a href="">长袖衬衫</a>
                                <a href="">风衣</a>
                                <a href="">休闲西装</a>
                                <a href="">棉衣</a>
                                <a href="">休闲长裤</a>
                                <a href="">内衣内裤</a>
                            </dd>
                        </dl>
                        
                    </div>
                    <div class="shop_bd_home_block_left_pic">
                        <a href=""><img src="/shop/Public/Home/images/web-1-13_53bfbfc958cb55a435545033bd075bf3.png"/></a>
                    </div>
                </div>
                <!-- 左边 End -->
                
                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">服务</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>
                            <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                            <li>
                                <dl>
                                    <dt><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><img src="/shop/<?php echo ($val["goods_img"]); ?>" alt="" width="80" height="80"/></a></dt>
                                    <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><?php echo ($val["goods_brief"]); ?></a></dd>
                                    <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>">商城价：<em><?php echo ($val["shop_price"]); ?></em>元</a></dd>
                                </dl>
                            </li>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->

                
            </div>
            <div clas="clear"></div>
            <!-- 第三块区域 End -->
            
            <!-- 第四块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">
                
                <!-- 左边 -->
                <div class="shop_bd_home_block_left">
                    <div class="shop_bd_home_block_left_logo block_nvzhuang_logo"></div>
                    <div class="shop_hd_home_block_left_class clearfix">
                        <dl class="clearfix">
                            <dt>女装</dt>
                            <dd>
                                <a href="">棉衣</a>
                                <a href="">毛呢大衣</a>
                                <a href="">风衣</a>
                                <a href="">打底衫</a>
                                <a href="">情侣装</a>
                                <a href="">毛呢短裤</a>
                                <a href="">牛仔裤</a>
                                <a href="">加绒打...</a>
                                <a href="">小脚裤</a>
                                <a href="">半身裙</a>
                            </dd>
                        </dl>
                        
                        <dl class="clearfix">
                            <dt>男装</dt>
                            <dd>
                                <a href="">羽绒服</a>
                                <a href="">卫衣</a>
                                <a href="">长袖T桖</a>
                                <a href="">长袖衬衫</a>
                                <a href="">风衣</a>
                                <a href="">休闲西装</a>
                                <a href="">棉衣</a>
                                <a href="">休闲长裤</a>
                                <a href="">内衣内裤</a>
                            </dd>
                        </dl>
                        
                    </div>
                    <div class="shop_bd_home_block_left_pic">
                        <a href=""><img src="/shop/Public/Home/images/web-1-13_53bfbfc958cb55a435545033bd075bf3.png"/></a>
                    </div>
                </div>
                <!-- 左边 End -->
                
                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">服务</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>
                            <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <li>
                                        <dl>
                                            <dt><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><img src="/shop/<?php echo ($val["goods_img"]); ?>" alt="" width="80" height="80"/></a></dt>
                                            <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><?php echo ($val["goods_brief"]); ?></a></dd>
                                            <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>">商城价：<em><?php echo ($val["shop_price"]); ?></em>元</a></dd>
                                        </dl>
                                    </li>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->
                
                <!-- 右边商品排行 -->

                <!-- 右边商品排行 -->
                

                
            </div>
            <div clas="clear"></div>
            <!-- 第四块区域 End -->
            
            <!-- 第五块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">
                
                <!-- 左边 -->
                <div class="shop_bd_home_block_left">
                    <div class="shop_bd_home_block_left_logo block_nvzhuang_logo"></div>
                    <div class="shop_hd_home_block_left_class clearfix">
                        <dl class="clearfix">
                            <dt>女装</dt>
                            <dd>
                                <a href="">棉衣</a>
                                <a href="">毛呢大衣</a>
                                <a href="">风衣</a>
                                <a href="">打底衫</a>
                                <a href="">情侣装</a>
                                <a href="">毛呢短裤</a>
                                <a href="">牛仔裤</a>
                                <a href="">加绒打...</a>
                                <a href="">小脚裤</a>
                                <a href="">半身裙</a>
                            </dd>
                        </dl>
                        
                        <dl class="clearfix">
                            <dt>男装</dt>
                            <dd>
                                <a href="">羽绒服</a>
                                <a href="">卫衣</a>
                                <a href="">长袖T桖</a>
                                <a href="">长袖衬衫</a>
                                <a href="">风衣</a>
                                <a href="">休闲西装</a>
                                <a href="">棉衣</a>
                                <a href="">休闲长裤</a>
                                <a href="">内衣内裤</a>
                            </dd>
                        </dl>
                        
                    </div>
                    <div class="shop_bd_home_block_left_pic">
                        <a href=""><img src="/shop/Public/Home/images/web-1-13_53bfbfc958cb55a435545033bd075bf3.png"/></a>
                    </div>
                </div>
                <!-- 左边 End -->
                
                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">服务</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>
                            <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <li>
                                        <dl>
                                            <dt><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><img src="/shop/<?php echo ($val["goods_img"]); ?>" alt="" width="80" height="80"/></a></dt>
                                            <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>"><?php echo ($val["goods_brief"]); ?></a></dd>
                                            <dd><a href="/shop/index.php/Home/Index/goods/id/<?php echo ($val["g_id"]); ?>">商城价：<em><?php echo ($val["shop_price"]); ?></em>元</a></dd>
                                        </dl>
                                    </li>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div clas="clear"></div>
            <!-- 第五块区域 End -->
            
            <div class="faq">
                <dl>
                    <dt>帮助中心</dt>
                    <dd><a href=""><span>积分兑换说明</span></a></dd>
                    <dd><a href=""><span>积分明细</span></a></dd>
                    <dd><a href=""><span>查看已购买商</span></a></dd>
                    <dd><a href=""><span>我要买</span></a></dd>
                    <dd><a href=""><span>忘记密码</span></a></dd>
                </dl>
                
                <dl>
                    <dt>店主之家</dt>
                    <dd><a href=""><span>如何申请开店</span></a></dd>
                    <dd><a href=""><span>商城商品推荐</span></a></dd>
                    <dd><a href=""><span>如何发货</span></a></dd>
                    <dd><a href=""><span>查看已售商品</span></a></dd>
                    <dd><a href=""><span>如何管理店铺</span></a></dd>
                </dl>
                
                <dl>
                    <dt>支付方式</dt>
                    <dd><a href=""><span>公司转账</span></a></dd>
                    <dd><a href=""><span>邮局汇款</span></a></dd>
                    <dd><a href=""><span>分期付款</span></a></dd>
                    <dd><a href=""><span>在线支付</span></a></dd>
                    <dd><a href=""><span>如何注册支付</span></a></dd>
                </dl>
                
                <dl>
                    <dt>售后服务</dt>
                    <dd><a href=""><span>退款申请</span></a></dd>
                    <dd><a href=""><span>返修/退换货</span></a></dd>
                    <dd><a href=""><span>退换货流程</span></a></dd>
                    <dd><a href=""><span>退换货政策</span></a></dd>
                    <dd><a href=""><span>联系卖家</span></a></dd>
                </dl>
                
                <dl>
                    <dt>客服中心</dt>
                    <dd><a href=""><span>修改收货地址</span></a></dd>
                    <dd><a href=""><span>商品发布</span></a></dd>
                    <dd><a href=""><span>会员修改个人</span></a></dd>
                    <dd><a href=""><span>会员修改密码</span></a></dd>
                    
                </dl>
                
                <dl>
                    <dt>关于我们</dt>
                    <dd><a href=""><span>合作及洽谈</span></a></dd>
                    <dd><a href=""><span>招聘英才</span></a></dd>
                    <dd><a href=""><span>联系我们</span></a></dd>
                    <dd><a href=""><span>关于Shop</span></a></dd>
                </dl>
                
                
            </div>
            <div class="clear"></div>
	</div>
	<!-- Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_link">
                <p>
                    <a href="">首页</a>|
                    <a href="">招聘英才</a>|
                    <a href="">广告合作</a>|
                    <a href="">关于ShopCZ</a>|
                    <a href="">关于我们</a>
                </p>
            </div>
            <div class="shop_footer_copy">
                <p>Copyright 2004-2013 itcast Inc.,All rights reserved.</p>
            </div>
        </div>
	<!-- Footer End -->
</body>
</html>