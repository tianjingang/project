<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>Videos</title>
<link href="/php3xiangmu/Public/Home/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="/php3xiangmu/Public/Home/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="/php3xiangmu/Public/Home/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
        <div class="menu">
    <ul>
        <li><a href="/php3xiangmu/index.php/Home/Index/index"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
        <li><a href="/php3xiangmu/index.php/Home/Index/videos"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
        <li><a href="/php3xiangmu/index.php/Home/Index/reviews"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
        <li><a href="/php3xiangmu/index.php/Home/Index/hehe"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
        <li><a class="active" href="/php3xiangmu/index.php/Home/Index/contact"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
    </ul>
</div>
			<!--<div class="menu">
				<ul>
					<li><a href="/php3xiangmu/index.php/Home/Index/index.html"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
					<li><a class="active" href="/php3xiangmu/index.php/Home/Index/videos"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
					<li><a href="/php3xiangmu/index.php/Home/Index/reviews.html"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<li><a href="/php3xiangmu/index.php/Home/Index/hehe.html"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li>
					<li><a href="/php3xiangmu/index.php/Home/Index/   contact.html"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>-->
		<div class="main">
		<div class="video-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="/php3xiangmu/Public/Home/images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="right-content">
				<div class="right-content-heading">
					<div class="right-content-heading-left">
						<h3 class="head" style="color: red">电影列表</h3>
					</div>
				</div>
				<!-- pop-up-box --> 
		<link href="/php3xiangmu/Public/Home/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
		<script src="/php3xiangmu/Public/Home/js/jquery.magnific-popup.js" type="text/javascript"></script>
		 <script>
				$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});
				});
		</script>		

		<!--//pop-up-box -->

				<div class="content-grids">
                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="content-grid">
						<a  href="/php3xiangmu/index.php/Home/Index/hehe/id/<?php echo ($val["id"]); ?>">
                            <video src="/php3xiangmu<?php echo ($val["w_wmv"]); ?>" controls width="240"></video>
                           </a>
						<h3>电影名字:<?php echo ($val["w_name"]); ?>
                            </br>
                            主演者:<?php echo ($val["w_man"]); ?>
                        </h3>
						<ul>
							<li><a href="#"><img src="/php3xiangmu/Public/Home/images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="/php3xiangmu/Public/Home/images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="/php3xiangmu/Public/Home/images/link.png" title="image-name" /></a></li>
						</ul>
						<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Watch now</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="clearfix"> </div>
					<!---start-pagenation----->
					<div class="pagenation">
						<ul>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
					<!---End-pagenation----->
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>	
	<div class="footer">
		<h6>Disclaimer : </h6>
		<p class="claim">This is a freebies and not an official website, I have no intention of disclose any movie, brand, news.My goal here is to train or excercise my skill and share this freebies.</p>
		<a href="example@mail.com">example@mail.com</a>
		<div class="copyright">
			<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="手机网站模板">手机网站模板</a> </p>
		</div>
	</div>	
	</div>
	<div class="clearfix"></div>
	</div>
</body>
</html>