<?php
class ClsHeader {
	function createHtml( $data = null ) {
	?>
		<header>
			<?php $this->siteName()?>
		</header>
		<?php $this->navigation()?>
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
                    	<li class="nav-link"><a href="<?php echo HOME_LINK?>blog/page/1">BLOG</a></li>
                    	<li class="nav-link"><a href="<?php echo HOME_LINK?>shop">SHOP</a></li>
                    	<li class="nav-link"><a href="<?php echo HOME_URL?>about-us<?php echo FORMAT?>">ABOUT</a></li>
                    	<li class="nav-link"><a href="<?php echo HOME_URL?>contact-us<?php echo FORMAT?>">CONTACT</a></li>
                    	<li class="nav-link"><a href="<?php echo HOME_URL?>privacy-policy<?php echo FORMAT?>">PRIVACY POLICY</a></li>
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