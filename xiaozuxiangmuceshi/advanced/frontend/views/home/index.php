<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="" name="description">
<meta content="" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
console.log(1);
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>
<link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
<script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
<script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/additional-methods.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">
var youdao_conv_id = 271546; 
</script> 
<script type="text/javascript" src="style/js/conv.js"></script>
</head>
<body>
<div id="body">
	<div id="header">
    	<div class="wrapper">
    		<a href="index.html" class="logo">
    			<img src="style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
    		</a>
    		<ul class="reset" id="navheader">
    			<li class="current"><a href="?r=home/login">首页</a></li>
    			<li ><a href="?r=company/companylist" >公司</a></li>
    			<li ><a href="#" target="_blank">论坛</a></li>
    				    			<li ><a href="?r=resume/resume" rel="nofollow">我的简历</a></li>
	    							    			<li ><a href="?r=create/create" rel="nofollow">发布职位</a></li>
	    		    		</ul>
        	            <ul class="loginTop">
                          <font color="blue"> <?php
                           $session = \Yii::$app->session;
                          if(isset($session['username'])){
                               echo $session['username'];
                               ?>
                              </font>
                              <a href="?r=home/loginout"> <font style="color: red;">退出</font></a>
                               <?php  }else{?>
                               <li><a href="?r=home/log" rel="nofollow">登录</a></li>
            	               <li>|</li>
            	               <li><a href="?r=home/register" rel="nofollow">注册</a></li>
                           <?php } ?>

            </ul>
                                </div>
    </div><!-- end #header -->
    <div id="container">
        <div id="sidebar">
            <div class="mainNavs">
                <?php foreach ($arr as $kone => $vone) {?>
                    <div class="menu_box">
                        <div class="menu_main">
                            <h2><?php echo $vone['name']?> <span></span></h2>
                            <?php foreach ($vone['child'] as $ktwo => $vtwo) {?>
                                <a href="#"><?php echo $vtwo['name']?></a>
                            <?php }?>
                        </div>
                        <div class="menu_sub dn">
                            <?php foreach ($vone['child'] as $ktwo => $vtwo) {?>
                                <dl class="reset">

                                    <dt>
                                        <a href="#"><?php echo $vtwo['name']?></a>
                                    </dt>

                                    <dd>
                                        <?php foreach ($vtwo['child'] as $kthree => $vthree) {?>

                                            <a href="#"><?php echo $vthree['name']?></a>
                                        <?php }?>
                                    </dd>
                                </dl>
                            <?php }?>
                        </div>

                    </div>
                <?php }?>
            </div>
           <a class="subscribe" href="subscribe.html" target="_blank">订阅职位</a>
        </div>

        <div class="content">
            <div id="search_box">
                <form   action="index.php?r=sphinx/index" method="post">
                    <ul id="searchType">
                        <li data-searchtype="1" class="type_selected">职位</li>
                        <li data-searchtype="4">公司</li>
                    </ul>
                    <div class="searchtype_arrow"></div>
                    <input type="text" id="search_input" name = "kd"  tabindex="1" value=""  placeholder="请输入职位名称，如：产品经理"  />
                    <input type="hidden" name="xuan" id="searchtype1" value="职位">
                    <input type="submit" id="search_button" value="搜索" />
                </form> 
				<script>
    $(function(){
        $("#searchType li").click(function(){
            var kd = $('#searchType li').html()
            $("#searchtype1").val(kd);
        })
    })
                </script>
            </div>
<style>
.ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border: 2px solid #91cebe;}
.ui-autocomplete-category{font-size:16px;color:#999;width:50px;position: absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top: 1px dashed #e5e5e5;padding:5px 0;}
.ui-menu-item{ *width:439px;vertical-align: middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right: 1px dashed #ededed;}
.ui-menu-item a{display:block;overflow:hidden;}
</style>
<script type="text/javascript" src="style/js/search.min.js"></script>
            <dl class="hotSearch">
                <dt>热门搜索：</dt>
                <?php
                foreach ($data as $key => $value) {
                    ?>
                    <dd><a href="index.php?r=sphinx/sou&sou=<?=$value['p_positionname'];?>"><?=$value['p_positionname'];?></a></dd>
                <?php
                }
                ?>
            </dl>
            <div id="home_banner">
	            <ul class="banner_bg">
                    <?php foreach($aa as $sd){ ?>
                    <li  class="banner_bg_1 current" >
                        <a href="h/subject/s_buyfundation.html?utm_source=DH__lagou&utm_medium=banner&utm_campaign=haomai" target="_blank"><img src="<?php echo $sd['c_logo']?>" width="612" height="160" alt="<?php echo $sd['c_name']?>" /></a>
                    </li>
                    <?php } ?>
	                	            </ul>
	            <div class="banner_control">
	                <em></em> 
	                <ul class="thumbs">
                        <?php foreach($aa as $sd){ ?>
                        <li  class="thumbs_1 current" >
                            <i></i>
                            <img src="<?php echo $sd['c_logo']?>" width="113" height="42" />
                        </li>
                        <?php }?>
	                    	                </ul>
	            </div>
	        </div><!--/#main_banner-->
			
        	<ul id="da-thumbs" class="da-thumbs">
                <?php foreach($aa as $sd){ ?>
                <li >
                    <a href="h/c/1650.html" target="_blank">
                        <img src="<?php echo $sd['c_logo']?>" width="113" height="113" alt="联想" />
                        <div class="hot_info">
                            <h2 title="联想"><?php echo $sd['c_name']?></h2>
                            <em></em>
                            <p title="世界因联想更美好">
                                <?php echo $sd['c_introduce']?>
                            </p>
                        </div>
                    </a>
                </li>
                <?php } ?>

                            </ul>
            
            <ul class="reset hotabbing">
            	            		<li class="current">热门职位</li>
            	            	<!--<li>最新职位</li>-->
            </ul>
            <div id="hotList">
	            <ul class="hot_pos reset">
	            		            		            				            		<li class="clearfix">

                                    <?php
                                    foreach($ccc as $k=>$v) {
                                        ?>
                                        <div class="hot_pos_l">
                                            <div class="mb10">
                                                <a href="h/jobs/147822.html" target="_blank"><?=$v['p_positiontype']?></a>
                                                &nbsp;
                                                <span class="c9">[<?=$v['p_work']?>]</span>
                                            </div>
                                            <span><em class="c7">月薪： </em><?=$v['p_salarymax']?>k-<?=$v['p_salarymin']?>k</span>
                                            <span><em class="c7">经验：</em> <?=$v['p_workyear']?></span>
                                            <span><em class="c7">最低学历： </em><?=$v['p_education']?></span>
                                            <br/>
                                            <span><em class="c7">职位诱惑：</em><?=$v['p_positionadvantage']?></span>
                                            <br/>
                                            <span>发布时间:<?=$v['p_time']?></span>
                                            <!-- <a  class="wb">分享到微博</a> -->
                                        </div>
                                    <?php
                                    }
                                    ?>
			                    	<div class="mb10 recompany">
                                        <a href="h/c/399.html" target="_blank">节操精选</a><br/>
                                    <?php
                                    foreach($aaa as $po){ ?>
                                        <br/><span><em class="c7">领域：</em> <?php echo $po['c_field'] ?></span>
                                        <span><em class="c7">创始人：</em><?php echo $po['founder'] ?></span>
                                        <br />
                                        <span><em class="c7">阶段：</em> <?php echo $po['c_stage'] ?></span>
                                        <span><em class="c7">规模：</em><?php echo $po['c_size'] ?></span>

                                    <?php } ?></div>
			                    </div>
			                    			                </li>


	                		                	            				            		<li class="clearfix">
		            																		            					                	<div class="hot_pos_l">

			                    </div>

			                    			                </li>
	                		                	                
	                	                <a href="list.html" class="btn fr" target="_blank">查看更多</a>
	                	            </ul>
	            <ul class="hot_pos hot_posHotPosition reset" style="display:none;">





	                	                	            				            		<li class="odd clearfix">
		            				            					                	<div class="hot_pos_l">
			                    	<div class="mb10">
			                        	<a href="h/jobs/120282.html" target="_blank">资深.Net开发工程师-北京-02466</a> 
			                            &nbsp;
			                            <span class="c9">[北京]</span>
			                            			                        </div>
			                        <span><em class="c7">月薪： </em>15k-22k</span>
			                        <span><em class="c7">经验：</em>5-10年</span>
			                        <span><em class="c7">最低学历：</em> 本科</span>
			                        <br />
			                        <span><em class="c7">职位诱惑：</em>六险一金，饭补，班车，晋升机制，氛围好</span>
			                        <br />
				                    <span>14:16发布</span>
			                        <!-- <a  class="wb">分享到微博</a> -->
			                    </div>
			                	<div class="hot_pos_r">
			                    	<div class="mb10"><a href="h/c/8143.html" target="_blank">途家网</a></div>
			                        <span><em class="c7">领域：</em> 移动互联网,O2O</span>
			                        			                        <span><em class="c7">创始人：</em>罗军</span>
			                        			                        <br />
			                        <span> <em class="c7">阶段： </em>成长型(B轮)</span>
			                        <span> <em class="c7">规模：</em>500-2000人</span>
			                        <ul class="companyTags reset">
			                        				                        					                        			<li>绩效奖金</li>
			                        					                        				                        					                        			<li>五险一金</li>
			                        					                        				                        					                        			<li>带薪年假</li>
			                        					                        				                        </ul>
			                    </div>
			                </li>
	                	                	            				            		<li class="clearfix">
		            				            					                	<div class="hot_pos_l">
			                    	<div class="mb10">
			                        	<a href="h/jobs/91655.html" target="_blank">市场策划经理-线上活动-北京-02267</a> 
			                            &nbsp;
			                            <span class="c9">[北京]</span>
			                            			                        </div>
			                        <span><em class="c7">月薪： </em>10k-15k</span>
			                        <span><em class="c7">经验：</em>5-10年</span>
			                        <span><em class="c7">最低学历：</em> 本科</span>
			                        <br />
			                        <span><em class="c7">职位诱惑：</em>六险一金，饭补，班车，晋升机制，氛围好</span>
			                        <br />
				                    <span>14:16发布</span>
			                        <!-- <a  class="wb">分享到微博</a> -->
			                    </div>
			                	<div class="hot_pos_r">
			                    	<div class="mb10"><a href="h/c/8143.html" target="_blank">途家网</a></div>
			                        <span><em class="c7">领域：</em> 移动互联网,O2O</span>
			                        			                        <span><em class="c7">创始人：</em>罗军</span>
			                        			                        <br />
			                        <span> <em class="c7">阶段： </em>成长型(B轮)</span>
			                        <span> <em class="c7">规模：</em>500-2000人</span>
			                        <ul class="companyTags reset">
			                        				                        					                        			<li>绩效奖金</li>
			                        					                        				                        					                        			<li>五险一金</li>
			                        					                        				                        					                        			<li>带薪年假</li>
			                        					                        				                        </ul>
			                    </div>
			                </li>
	                	                	                <a href="list.html?city=%E5%85%A8%E5%9B%BD" class="btn fr" target="_blank">查看更多</a>
	            </ul>
            </div>
            
            <div class="clear"></div>
			<div id="linkbox">
			    <dl>
			        <dt>友情链接</dt>
			        <dd>
			        		<a href="http://www.zhuqu.com/" target="_blank">住趣家居网</a> <span>|</span>
			        		<a href="http://www.woshipm.com/" target="_blank">人人都是产品经理</a> <span>|</span>
			        		<a href="http://zaodula.com/" target="_blank">互联网er的早读课</a> <span>|</span>
			                <a href="http://lieyunwang.com/" target="_blank">猎云网</a> <span>|</span>
			        		<a href="http://www.ucloud.cn/" target="_blank">UCloud</a> <span>|</span>
			          		<a href="http://www.iconfans.com/" target="_blank">iconfans</a>  <span>|</span>
			          		<a href="http://www.html5dw.com/" target="_blank">html5梦工厂</a>   <span>|</span>
			          		<a href="http://www.sykong.com/" target="_blank">手游那点事</a> 
                        <a href="h/af/flink.html" target="_blank" class="more">更多</a>
			        </dd>
			    </dl>
			</div>
        </div>	
 	    <input type="hidden" value="" name="userid" id="userid" />
 		<!-- <div id="qrSide"><a></a></div> -->
<!--  -->

<!-- <div id="loginToolBar">
	<div>
		<em></em>
		<img src="style/images/footbar_logo.png" width="138" height="45" />
		<span class="companycount"></span>
		<span class="positioncount"></span>
		<a href="#loginPop" class="bar_login inline" title="登录"><i></i></a>
		<div class="right">
			<a href="register.html?from=index_footerbar" onclick="_hmt.push(['_trackEvent', 'button', 'click', 'register'])" class="bar_register" id="bar_register" target="_blank"><i></i></a>
		</div>
		<input type="hidden" id="cc" value="16002" />
		<input type="hidden" id="cp" value="96531" />
	</div>
</div>
 -->
<!-------------------------------------弹窗lightbox  ----------------------------------------->
<div style="display:none;">
	<!-- 登录框 -->
	<div id="loginPop" class="popup" style="height:240px;">
       	<form id="loginForm">
			<input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" />
			<input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
			<span class="error" style="display:none;" id="beError"></span>
		    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
		    <a href="h/reset.html" class="fr">忘记密码？</a>
		    <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
		</form>
		<div class="login_right">
			<div>还没有拉勾帐号？</div>
			<a href="register.php" class="registor_now">立即注册</a>
		    <div class="login_others">使用以下帐号直接登录:</div>
		    <a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb" title="使用新浪微博帐号登录"></a>
		    <a href="h/ologin/auth/qq.html" class="icon_qq" id="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
		</div>
    </div><!--/#loginPop-->
</div>
<!------------------------------------- end ----------------------------------------->
<script type="text/javascript" src="style/js/Chart.min.js"></script>
<script type="text/javascript" src="style/js/home.min.js"></script>
<script type="text/javascript" src="style/js/count.js"></script>
			<div class="clear"></div>
			<input type="hidden" id="resubmitToken" value="" />
	    	<a id="backtop" title="回到顶部" rel="nofollow"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
		    <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
		    <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
		    <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!-- <script src="style/js/wb.js" type="text/javascript" charset="utf-8"></script>
 -->
<script>
    $(function(){
        $("#searchType li").click(function(){
            var kd = $('#searchType li').html()
            $("#searchtype1").val(kd);
        })
    })
</script>

</body>
</html>	