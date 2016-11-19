<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>购物车页面</title>
    <link rel="stylesheet" href="/shop/Public/Home/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/shop/Public/Home/css/shop_common.css" type="text/css" />
    <link rel="stylesheet" href="/shop/Public/Home/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/shop/Public/Home/css/shop_gouwuche.css" type="text/css" />
    <script type="text/javascript" src="/shop/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/shop/Public/Home/js/jquery.goodnums.js" ></script>
    <script type="text/javascript" src="/shop/Public/Home/js/shop_gouwuche.js" ></script>
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
                    <?php else: ?>
                    <p>您好，欢迎来到<b><a href="/">ShopCZ商城</a></b>[<a href="<?php echo U('Login/login');?>">登录</a>][<a href="<?php echo U('Register/register');?>">注册</a>]</p><?php endif; ?>
                <a href="<?php echo U('Login/login_out');?>">退出</a>
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
        <div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/shop/Public/Home/images/logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
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

        <div id="shop_hd_menu_all_category" class="shop_hd_menu_all_category"><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
            <div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
            <div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
                <ul class="shop_hd_menu_all_category_hd_menu clearfix">
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

                            <dl class="clearfix">
                                <dt><a href="男装" href="">男装</a></dt>
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
                        <h3><a href="" title="鞋包配饰">鞋包配饰</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix`" style="">
                            <dl class="clearfix">
                                <dt><a href="鞋子" href="">鞋子</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="包包" href="">包包</a></dt>
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

                    <li id="cat_3" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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

                    <li id="cat_4" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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

                    <li id="cat_5" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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

                    <li id="cat_6" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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
                    <li id="cat_7" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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
                    <li id="cat_8" class="">
                        <h3><a href="" title="美容美妆">美容美妆</a></h3>
                        <div id="cat_1_menu" class="cat_menu clearfix" style="">
                            <dl class="clearfix">
                                <dt><a href="美容" href="">美容</a></dt>
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

                            <dl class="clearfix">
                                <dt><a href="美妆" href="">美妆</a></dt>
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
<!-- 面包屑 注意首页没有 -->
<div class="shop_hd_breadcrumb">
    <strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">我的购物车</a>
		</span>
</div>
<div class="clear"></div>
<!-- 面包屑 End -->

<!-- Header End -->

<!-- 购物车 Body -->
<div class="shop_gwc_bd clearfix">
    <!-- 在具体实现的时候，根据情况选择其中一种情况 -->
    <!-- 购物车有商品 -->
    <div class="shop_gwc_bd_contents clearfix">
        <!-- 购物流程导航 -->
        <div class="shop_gwc_bd_contents_lc clearfix">
            <ul>
                <li class="step_a hover_a">确认购物清单</li>
                <li class="step_b">确认收货人资料及送货方式</li>
                <li class="step_c">购买完成</li>
            </ul>
        </div>
        <!-- 购物流程导航 End -->

        <!-- 购物车列表 -->
        <div id="div1">
            <table border="1">
                <thead>
                <tr>
                    <th><span>收件地址</span></th>
                    <th><span>收件人</span></th>
                    <th><span>联系方式</span></th>
                    <th><span>商品</span></th>
                    <th><span>商品金额</span></th>
                    <th><span>商品数量</span></th>
                    <th><span>订单号</span></th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="gwc_list_pic"><a href=""><?php echo ($v["a_address"]); ?></a></td>
                        <td class="gwc_list_pic"><a href=""><?php echo ($v["a_name"]); ?></a></td>
                        <td class="gwc_list_pic"><a href=""><?php echo ($v["a_phone"]); ?></a></td>
                        <td class="gwc_list_pic"><a href=""><img src="/shop/<?php echo ($v["goods_img"]); ?>" alt="" height="80" width="80"/></a></td>
                        <td class="gwc_list_danjia"><span>￥<strong id="danjia_001"><?php echo ($v["shop_price"]); ?></strong></span></td>
                        <td class="gwc_list_xiaoji"><span><strong id="xiaoji_002" class="good_xiaojis"><?php echo ($v["goods_number"]); ?></strong></span></td>
                        <td class="gwc_list_xiaoji"><span><strong id="xiaoji_003" class="good_xiaojis"><?php echo ($v["g_sn"]); ?></strong></span></td>
                    </tr>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong id="good_zongjia">1.00</strong></span></div>
                        <div class="clear"></div>
                        <div class="gwc_foot_links">
                            <a href="#" class="go">货到付款</a>
                            <a href="/shop/index.php/Home/Flow/pays/shop_price/<?php echo ($v["shop_price"]); ?>/g_sn/<?php echo ($v["g_sn"]); ?>" class="op">支付宝支付</a>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- 购物车列表 End -->
    </div>
    <!-- 购物车有商品 end -->

</div>
<!-- 购物车 Body End -->

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