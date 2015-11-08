<?php
class ClsHeader {
	use CategoriesLink;

	function createHtml( $data = null ) {

		// echo "<pre>";
		// print_r( $data );
		// echo "</pre>";
	?>
			<div id="top-header">
				<div id="top-header-container">
					<div id="top-header-right">
						<ul>
							<li><a href="<?php echo HOME_URL?>about-us<?php echo FORMAT?>">About</a></li>
                    		<li><a href="<?php echo HOME_URL?>contact-us<?php echo FORMAT?>">Contact</a></li>
                    		<li><a href="<?php echo HOME_URL?>privacy-policy<?php echo FORMAT?>">Privacy-Policy</a></li>
                    	</ul>
					</div>
				</div>
			</div>
			<div id="bottom-header">
				<div id="bottom-header-left"><?php echo $this->SiteName()?></div>
				<div id="bottom-header-right"><?php $this->navigation()?></div>
			</div>

		
	<?php
	}

	function navigation() {
	?>
		<div class="navigation">
            <div class="navigation-wrapper">
                <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu"><span class="icon fa fa-navicon"></span></a>
                <nav role="navigation">
                    <ul id="js-navigation-menu" class="navigation-menu show">
                    	<li class="nav-link"><a href="<?php echo HOME_LINK?>">HOME</a></li>
                    	<li class="nav-link"><a href="<?php echo $this->getCategoriesLink( 'categories' )?>">CATEGORIES</a></li>
                    	<li class="nav-link"><a href="<?php echo $this->getCategoriesLink( 'brands' )?>">BRANDS</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <?php
	}

	function siteName() {
		echo '<a href="' . HOME_LINK . '">' . strtoupper( SITE_NAME) . '</a>';
	}
}

//echo '<li class="nav-link"><a href="' . HOME_URL . 'blog/page/1">BLOG</a></li>';




