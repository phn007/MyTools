<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( isset( $seoTags ) ) echo $seoTags ?>
	<link rel="stylesheet" href="<?php echo CSS_PATH?>style.css">
</head>
<body>
  	<div class="main-content">
		<header>
			<?php
				$cat = new CatMenuList_Plugin();
				$mnList = $cat->menuList();
			?>
            <div class="navigation">
	            <div class="navigation-wrapper">
	                <a href="<?php echo HOME_LINK?>" class="logo"><span id="home-icon" class="icon fa fa-home"></span></a>
	                <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu"><span class="icon fa fa-navicon"></span></a>
	                <nav role="navigation">
	                    <ul id="js-navigation-menu" class="navigation-menu show">
	                        <?php foreach ( $mnList as $name => $link ): ?>
								<li class="nav-link"><a href="<?php echo $link?>"><?php echo strtoupper( $name )?> <span class="icon fa fa-reorder"></span></a></li>
	                        <?php endforeach ?>
	                    </ul>
	                </nav>
	            </div>
        	</div>

        	<div id="head">
	            <div id="logo">
	            	<a href="<?php echo HOME_LINK?>"><?php echo strtoupper( SITE_NAME )?></a>
	            </div>
	            <div id="description">
	            	<?php if ( $data['current-page'] == 'home-page' ) echo SITE_DESC ?>
	            	<?php if ( $data['current-page'] == 'product-page' ) echo $data['product-detail']['keyword'] ?>
	            </div>
        	</div>
		</header>

		<div class="main">[%LAYOUT_CONTENT%]</div>
	</div>

	<footer class="footer">
		<div id="footer-tab">
            <div id="social">
            	<ul class="social">
                <li><a href="<?php echo facebook()?>" title="Facebook"><span class="icon fa fa-facebook"></span></a></li>
                <li><a href="<?php echo twitter()?>" title="Twitter"><span class="icon fa fa-twitter"></span></a></li>
                <li><a href="<?php echo googlePlus()?>" title="Google+"><span class="icon fa fa-google-plus"></span></a></li>
                <li><a href="<?php echo pinterest()?>" title="Pinterest"><span class="icon fa fa-pinterest"></span></a></li>
                <li><a href="<?php echo linkedIn()?>" title="LinkedIn"><span class="icon fa fa-linkedin"></span></a></li>
                <li><a href="<?php echo stumbleupon()?>" title="Stumbleupon"><span class="icon fa fa-stumbleupon"></span></a></li>
                </ul>
            </div>
        </div>
	    <div id="footer-container">
	        <ul id="static-page">
	            <li><a href="<?php echo HOME_URL?>about<?php echo FORMAT?>">About us</a></li>
	            <li><a href="<?php echo HOME_URL?>contact<?php echo FORMAT?>">Contact us</a></li>
	            <li><a href="<?php echo HOME_URL?>privacy-policy<?php echo FORMAT?>">Privacy Policy</a></li>
	            <li><a href="<?php echo HOME_URL?>categories/1">Categories</a></li>
	            <li><a href="<?php echo HOME_URL?>brands/1">Brands</a></li>
	        </ul>
	        
	        <div id="copyright">
	        	<?php copyrightLink( $data )?>
	        </div>
	    </div>
	</footer>
	<script src="<?php echo JS_PATH?>plugins.js"></script>
  	<script src="<?php echo JS_PATH?>main.js"></script>

  	<!-- Start of StatCounter -->
	  <script type="text/javascript">
	    var sc_project=<?php echo SC_PROJECT ?>;
	    var sc_invisible=1;
	    var sc_security="<?php echo SC_SECURITY ?>";
	    var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
	    document.write("<sc"+"ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></"+"script>");
	  </script>
	  <noscript>
	   <div class="statcounter">
	     <a title="websitestatistics" href="http://statcounter.com/free-web-stats/"
	      target="_blank"><img class="statcounter"
	      src="http://c.statcounter.com/<?php echo SC_PROJECT ?>/0/<?php echo SC_SECURITY ?>/1/"
	      alt="website statistics">
	      </a>
	    </div>
	  </noscript>
	  <!-- End of StatCounter -->
</body>
</html>



<?php
//Footer Functon Section
function getDomain() {
	$arr = explode( '/', rtrim( HOME_URL, '/' ) );
	return end( $arr );
}

function getYear() {
	date_default_timezone_set("Asia/Bangkok");
	return date("Y");
}

function copyrightLink( $footer ) {
?>
	<a href="<?php echo HOME_URL?>">©<?php echo getYear()?> <?php echo getDomain()?> – All Rights Reserved</a>
<?php
}

//Social Share
function facebook() {
	return 'http://www.facebook.com/share.php?u=' . url();
}
function twitter() {
	return 'http://twitter.com/share?text=' . url();
}
function googlePlus() {
	return 'http://www.google.com/bookmarks/mark?op=add&bkmk=' . url() . '&title=' . SITE_NAME;
}
function pinterest() {
	return 'http://pinterest.com/pin/create/button?url=' . url() . '&amp;title=' . SITE_NAME;
}
function linkedIn() {
	return 'http://linkedin.com/shareArticle?mini=true&amp;url=' . url() . '&amp;title=' . SITE_NAME;
}
function stumbleupon() {
	return 'http://www.stumbleupon.com/badge/?url=' . url();
}

function url() {
	return rtrim( HOME_LINK, '/' );
}


