<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Magnum</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/inner.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<link href="styles/ie8.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script> 
<script type="text/javascript" src="js/superfish.js"></script> 
<script type="text/javascript" src="js/supersubs.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	//Menu
	jQuery("ul.sf-menu").supersubs({ 
	minWidth		: 12,		// requires em unit.
	maxWidth		: 27,		// requires em unit.
	extraWidth		: 3	// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
						   // due to slight rounding differences and font-family 
	}).superfish();  // call supersubs first, then superfish, so that subs are 
					 // not display:none when measuring. Call before initialising 
					 // containing tabs for same reason. 
					 
	//jQuery tab
	jQuery(".tab-content").hide(); //Hide all content
	jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
	jQuery(".tab-content:first").show(); //Show first tab content
	//On Click Event
	jQuery("ul.tabs li").click(function() {
		jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(".tab-content").hide(); //Hide all tab content
		var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		jQuery(activeTab).fadeIn(200); //Fade in the active content
		return false;
	});
					 
});
</script>
</head>
<body>
<div style="text-align:center;height:90px; width:100%;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- DEMO_970_90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-3553298197128602"
     data-ad-slot="9659969381"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<div id="outer-container">
	<div id="container">
    	<div id="top">
        	<div id="logo"><a href="index.php"><img src="images/logo.png" width="270" height="110" alt=""  /></a></div><!-- end #logo -->
            <div id="nav">
                <ul id="topnav" class="sf-menu">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="product.php">商品</a>
                        <ul>
                            <li><a href="portfolio.html">Portfolio One Column</a></li>
                            <li><a href="portfolio2.html">Portfolio Two Column</a></li>
                            <li><a href="portfolio3.html">Portfolio Three Column</a></li>
                            <li><a href="portfolio4.html">Portfolio Four Column</a></li>
                        </ul>
                    </li>
                    <li><a href="services.php" class="current">服务</a></li>
                    <li><a href="contact.php">联系我们</a></li>
                </ul><!-- #topnav -->
            </div><!-- #nav -->	
        </div><!-- end #top -->
        
        <div id="header" class="innerpage">
        	<div class="shadow"></div>
        	<div class="container940">
        		<h1 class="pagetitle">Services</h1>
                <div class="pagedesc">This can be your Tagline or something you want.</div>
                <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #header -->
        
        
		<div id="content">
        	<div id="main">
                <h2 class="title_pattern uppercase"><span>Our Services</span></h2>
                <div class="one_third firstcols">
                    <img src="images/icons/icon4.png" alt="" class="alignleft" /><h2 class="valignmiddle">Proin id Eeifend Eros.</h2>
                    Suspendisse turpis tortor, lobortis eget suscipit ac, vehicula venenatis mi. Integer aliquet dapibus diam, <span class="colortext">eu ornare tortor tincidunt eget</span>.
                </div>
                <div class="one_third">
                    <img src="images/icons/icon5.png" alt="" class="alignleft" /><h2 class="valignmiddle">Curabitur Vitae Semper.</h2>
                    Suspendisse turpis tortor, lobortis eget suscipit ac, vehicula venenatis mi. Integer aliquet dapibus diam, <span class="colortext">eu ornare tortor tincidunt eget</span>.
                </div>
                <div class="one_third lastcols">
                    <img src="images/icons/icon6.png" alt="" class="alignleft" /><h2 class="valignmiddle">Donec id Turpis at Risus.</h2>
                    Suspendisse turpis tortor, lobortis eget suscipit ac, vehicula venenatis mi. Integer aliquet dapibus diam, <span class="colortext">eu ornare tortor tincidunt eget</span>.
                </div>
                
                <div class="separator"></div>
                
                <div class="tabcontainer">
                    <ul class="tabs">
                        <li><a href="#tab0">Lorem ipsum dolor1</a></li>
                        <li><a href="#tab1">Lorem ipsum dolor2</a></li>
                        <li><a href="#tab2">Lorem ipsum dolor3</a></li>
                    </ul>
                    <div id="tab-body">
                        <div id="tab0" class="tab-content">
                        	<img src="images/content/pic2.jpg" alt="" class="alignleft frame" />
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor placerat mi. Aliquam malesuada, felis eget auctor euismod, lacus tellus vulputate turpis.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius. Morbi fermentum commodo nisi, id interdum mauris suscipit pellentesque. Morbi velit eros, accumsan ut faucibus at, viverra id mi. Nunc augue nisl, rutrum vitae luctus nec, lobortis sit amet diam. Proin porttitor semper sollicitudin.</p>
                        </div>
                        <div id="tab1" class="tab-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius. Morbi fermentum commodo nisi, id interdum mauris suscipit pellentesque. Morbi velit eros, accumsan ut faucibus at, viverra id mi. Nunc augue nisl, rutrum vitae luctus nec, lobortis sit amet diam. Proin porttitor semper sollicitudin. Donec mollis rhoncus turpis et rhoncus. In elit nisl, ultrices id mollis ut, dapibus eget nulla. Fusce laoreet neque ut purus faucibus ut condimentum purus condimentum. Vestibulum vel magna ligula, in tincidunt augue. Fusce sit amet neque ut neque vestibulum rhoncus in eu nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer interdum sapien facilisis odio fermentum tincidunt. Nullam a ante augue.</p>
                        </div>
                        <div id="tab2" class="tab-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis feugiat rutrum luctus. Proin nisl augue, tempus quis lacinia at, ultrices eget sapien. Vestibulum at orci a eros molestie rutrum. Fusce interdum erat vel eros elementum vitae interdum massa varius. Morbi fermentum commodo nisi, id interdum mauris suscipit pellentesque. Morbi velit eros, accumsan ut faucibus at, viverra id mi. Nunc augue nisl, rutrum vitae luctus nec, lobortis sit amet diam. Proin porttitor semper sollicitudin. Donec mollis rhoncus turpis et rhoncus. In elit nisl, ultrices id mollis ut, dapibus eget nulla. Morbi nec magna erat, id tincidunt sapien. Morbi id porttitor lorem. In mi velit, viverra a congue et, congue sit amet nibh. Pellentesque a libero eget quam consequat condimentum eu eu est. Vestibulum at tellus eget massa accumsan volutpat. Suspendisse felis arcu, sagittis nec ultrices sit amet, faucibus a ante. Nunc et ante at ipsum iaculis porta eu quis augue. Praesent ultrices suscipit quam, vitae malesuada erat volutpat non. Sed ut tortor turpis, eu dignissim elit.</p>
                        </div>
                    </div>
                </div><!-- tabcontainer -->
                
                <div class="separator"></div>
                
                <h2 class="title_pattern uppercase"><span>Service Overview</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis lorem eu eros luctus dictum. Nullam lacus nisl, fermentum eget pharetra ut, dignissim sed massa. Morbi eget elit augue, eget congue sem. Quisque vulputate tortor nec sem blandit lobortis. <span class="colortext">Nunc odio tellus, vestibulum et accumsan nec, euismod ut nisl.</span> Donec arcu mi, tristique in fringilla vitae, scelerisque non libero. Quisque dolor lectus, fermentum et dictum nec, venenatis ut arcu. Ut est felis, semper id eleifend sed, porta vel arcu. Ut sed magna eu ligula adipiscing lacinia fermentum at tellus. </p>
                <ul class="customlist2">
                    <li>
                        <img src="images/content/pic14.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext">Vestibulum ante ipsum.</h5>
                         <p>Cras faucibus ante ut diam laoreet a congue mi aliquam. Sed interdum nisl pharetra ipsum aliquet tempus. Mauris pulvinar, nisl nec...</p>
                    </li>
                    <li>
                        <img src="images/content/pic15.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext">Etiam a elementum arcu.</h5>
                         <p>Cras faucibus ante ut diam laoreet a congue mi aliquam. Sed interdum nisl pharetra ipsum aliquet tempus. Mauris pulvinar, nisl nec...</p>
                    </li>
                    <li>
                        <img src="images/content/pic16.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext">Fusce eget leo quis tellus.</h5>
                         <p>Cras faucibus ante ut diam laoreet a congue mi aliquam. Sed interdum nisl pharetra ipsum aliquet tempus. Mauris pulvinar, nisl nec...</p>
                    </li>
                    <li class="last">
                        <img src="images/content/pic17.jpg" alt="" class="frame" />
                        <span class="shadowimg220"></span>
                        <h5 class="colortext">Nam sapien nisi consequat.</h5>
                        <p>Cras faucibus ante ut diam laoreet a congue mi aliquam. Sed interdum nisl pharetra ipsum aliquet tempus. Mauris pulvinar, nisl nec...</p>
                    </li>
                </ul>
                
                
            	<div class="clear"></div><!-- clear float -->
            </div><!-- end #main -->
		</div><!-- end #content -->
        
		<div id="footer">
        <div id="footer-pattern">
        
			<div class="container940">
            	<div id="footcol1">
                	<ul>
                    	<li class="widget-container">
                            <h2 class="widget-title">Latest Articles</h2>
                            <ul id="recentpostwidget">
                                <li>
                                    <img src="images/content/pic5.jpg" alt="" class="alignleft frame" />
                                    <h5><a href="#">Hello World!!</a></h5>
                                    <span>Lorem ipsum dolor sit amet...</span>
                                </li>
                                <li>
                                    <img src="images/content/pic6.jpg" alt="" class="alignleft frame" />
                                    <h5><a href="#">Hello World!!</a></h5>
                                    <span>Lorem ipsum dolor sit amet...</span>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol2">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title">Blogroll</h2>
                            <ul>
                            	<li><a href="#">Vivamus hendrerit venenatis quam</a></li>
                                <li><a href="#">Aenean congue nisl in nibh</a></li>
                                <li><a href="#">Proin tempus tempus orci eu imperdiet</a></li>
                                <li><a href="#">Mauris interdum</a></li>
                                <li><a href="#">Donec id turpis at risus</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol3">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title">Gallery</h2>
                            <ul id="flickr">
                            	<li><a href="#"><img src="images/content/pic7.jpg" alt="" class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic8.jpg" alt="" class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img src="images/content/pic9.jpg" alt="" class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic10.jpg" alt="" class="frame" /></a></li>
                                <li><a href="#"><img src="images/content/pic11.jpg" alt="" class="frame" /></a></li>
                                <li class="nomargin"><a href="#"><img src="images/content/pic12.jpg" alt="" class="frame" /></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="footcol4">
                	<ul>
                        <li class="widget-container">
                        	<h2 class="widget-title">About Magnum</h2>
                            <div class="textwidget">
                            <p>
                            Nulla interdum, enim eu dictum pellentesque, ipsum elit varius purus, et imperdiet odio magna lobortis purus. 
                            </p>
                            <span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sed mauris at eros mollis ultricies vitae porta dui. </span>
                            </div>
                        </li>
                    </ul>
                </div>
           
            <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
            
        </div><!-- end #footer-pattern -->  
		</div><!-- end #footer -->
        
        <div id="after-footer">
        	<div class="container940">
                <div id="sn">
                	<ul>
                    	<li><a href="#"><img src="images/icons/fb.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/icons/stumbleupon.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/icons/lastfm.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/icons/twitter.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/icons/youtube.png" alt="" /></a></li>
                    </ul>
                </div>
                <div id="footertext">
                    Copyright &copy;2012 Magnum.  All Rights Reserved.<a href="http://moban.alixixi.com" target="_blank">网站模板</a>|<a href="http://www.alixixi.com" target="_blank">网页模板</a>

                </div>
               <div class="clear"></div><!-- clear float -->
            </div><!-- end container940 -->
        </div><!-- end #after-footer -->
        
	</div><!-- end #container -->
</div><!-- end #outer-container -->
		
</body>
</html>
