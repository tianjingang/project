<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>Reviews</title>
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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
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
		<div class="main">
		<div class="review-content">
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
			<div class="reviews-section">
				<h3 class="head">Movie Reviews</h3>
                   <div class="col-md-9 reviews-grids">
 <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="review">
							<div class="movie-pic">
								<a href="/php3xiangmu/index.php/Home/Index/single/id/<?php echo ($v["id"]); ?>">
                                    <video src="/php3xiangmu<?php echo ($v["w_wmv"]); ?>" width="200" height="300"></video>
                                </a>
							</div>
							<div class="review-info">
								<a class="span" href="single.html"><?php echo ($v["w_name"]); ?></a>
								<p class="dirctr"><a href="">Reagan Gavin Rasquinha, </a>TNN, Mar 12, 2015, 12.47PM IST</p>								
								<p class="ratingview">Critic's Rating:</p>
								<div class="rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div>
								<p class="ratingview">
								&nbsp;3.5/5  
								</p>
								<div class="clearfix"></div>
								<p class="ratingview c-rating">Avg Readers' Rating:</p>
								<div class="rating c-rating">
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
									<span>☆</span>
								</div> 	
								<p class="ratingview c-rating">								
								&nbsp; 3.3/5</p>
								<div class="clearfix"></div>
								<div class="yrw">
									<div class="dropdown-button">           			
										<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
										<option value="0">Your rating</option>	
										<option value="1">1.Poor</option>
										<option value="2">1.5(Below average)</option>
										<option value="3">2.Average</option>
										<option value="4">2.5(Above average)</option>
										<option value="5">3.Watchable</option>
										<option value="6">3.5(Good)</option>
										<option value="7">4.5(Very good)</option>
										<option value="8">5.Outstanding</option>
									  </select>
									</div>
									<div class="rtm text-center">
										<a href="#">REVIEW THIS MOVIE</a>
									</div>
									<div class="wt text-center">
										<a href="#">WATCH THIS TRAILER</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<p class="info">热度指数:<?php echo ($v["w_row"]); ?></p>
								<p class="info">观看次数:<?php echo ($v["w_count"]); ?></p>
								<p class="info">是否推荐:<?php echo ($v["w_controduct"]); ?></p>
								<p class="info">时长:<?php echo ($v["w_time"]); ?></p>
							</div>
							<div class="clearfix"></div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Featured Today in Movie Reviews</h3>
							<ul>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f1.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f2.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f3.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f4.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f5.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<li>
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f6.jpg" alt="" /></a>
									<p>lorem movie review</p>
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
						
						<div class="entertainment">
							<h3>Featured Today in Entertainment</h3>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f6.jpg" alt="" /></a>
								</li>
								<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
								
								</li>
								<div class="clearfix"></div>
							</ul>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f5.jpg" alt="" /></a>
								</li>
									<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
							
								</li>
								<div class="clearfix"></div>
							</ul>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f3.jpg" alt="" /></a>
								</li>
								<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
								
								</li>
								<div class="clearfix"></div>
							</ul>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f4.jpg" alt="" /></a>
								</li>
								<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
								
								</li>
								<div class="clearfix"></div>
							</ul>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f2.jpg" alt="" /></a>
								</li>
								<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
							
								</li>
								<div class="clearfix"></div>
							</ul>
							<ul>
								<li class="ent">
									<a href="single.html"><img src="/php3xiangmu/Public/Home/images/f1.jpg" alt="" /></a>
								</li>
								<li>
									<a href="single.html">Watch ‘Bombay Velvet’ trailer during WC match</a>
								
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
						<div class="might">
				<h4>You might also like</h4>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="/php3xiangmu/Public/Home/images/mi.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="/php3xiangmu/Public/Home/images/mi1.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="/php3xiangmu/Public/Home/images/mi2.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="might-grid">
					<div class="grid-might">
						<a href="single.html"><img src="/php3xiangmu/Public/Home/images/mi3.jpg" class="img-responsive" alt=""> </a>
					</div>
					<div class="might-top">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
						<a href="single.html">Lorem Ipsum <i> </i></a>
					</div>
				<div class="clearfix"></div>
				</div>
			</div>
			<!---->
				<div class="grid-top">
				<h4 style="color: #003366">历史记录</h4>
                    <ul>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f1.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f2.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f3.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f4.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f5.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                        <li>
                            <a href="single.html"><img src="/php3xiangmu/Public/Home/images/f6.jpg" alt="" /></a>
                            <p>lorem movie review</p>
                        </li>
                    </ul>
				</div>
				<!---->

					</div>

					<div class="clearfix"></div>
			</div>
			</div>
		<div class="review-slider">
			 <ul id="flexiselDemo1">
			<li><img src="/php3xiangmu/Public/Home/images/r1.jpg" alt=""/></li>
			<li><img src="/php3xiangmu/Public/Home/images/r2.jpg" alt=""/></li>
			<li><img src="/php3xiangmu/Public/Home/images/r3.jpg" alt=""/></li>
			<li><img src="/php3xiangmu/Public/Home/images/r4.jpg" alt=""/></li>
			<li><img src="/php3xiangmu/Public/Home/images/r5.jpg" alt=""/></li>
			<li><img src="/php3xiangmu/Public/Home/images/r6.jpg" alt=""/></li>
		</ul>
			<script type="text/javascript">
		$(window).load(function() {
			
		  $("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
		</script>
		<script type="text/javascript" src="/php3xiangmu/Public/Home/js/jquery.flexisel.js"></script>
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