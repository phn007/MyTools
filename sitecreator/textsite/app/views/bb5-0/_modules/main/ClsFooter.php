<?php
class ClsFooter {
	function createHtml( $data ) {
		$sub = new SubdomainLinkListAddon();
		$subdomain = $sub->linkList();
	?>
		<footer id="footer-container">
			<div id="top-footer">
				<ul id="footer-page">
					<li><a href="<?php echo HOME_URL?>privacy-policy<?php echo FORMAT?>">Privacy Policy</a></li>
	            	<li><a href="<?php echo HOME_URL?>about-us<?php echo FORMAT?>">About us</a></li>
	            	<li><a href="<?php echo HOME_URL?>contact-us<?php echo FORMAT?>">Contact us</a></li>
	        	</ul>
	        	<ul id="footer-category">
	            	<li><a href="<?php echo HOME_LINK?>">Home</a></li>
	            	<?php echo $this->linkout( $data )?>
	        	</ul>
			</div>

			<?php 
			if ( $subdomain ) {
				echo '<hr id="hr-footer">';
				echo '<div id="related-site">';
			 	foreach ( $subdomain as $sub ) {
			 		$subLink = 'http://' . $sub;
			 		echo '<a href="' . $subLink . '">' . $sub . '</a>, ';
			 	}
			 	echo '</div>';
			 }
		 	?>

			<hr id="hr-footer">
			<div id="bottom-footer">
				<?php echo $this->copyright()?>
			</div>
		</footer>

	<?php
	}

	function copyright() {
	?>
		<a href="<?php echo HOME_URL?>">
			©<?php echo $this->_getYear()?> <?php echo $this->_getDomain()?>. ALL RIGHTS RESERVED</a>
	<?php
	}

	function linkout( $data ) {
		if ( $data['current-page'] == 'product-page' ): 
			extract( $data['spin-content'] );	
			extract( $data['product-detail'] );
		?>
		<li><a rel="nofollow" target="_blank" href="<?php echo $this->_getLinkout( $keyword, $linkout1 )?>"><?php echo $keyword?></a></li>

	<?php
		endif;
	}

	function _getDomain() {
		$arr = explode( '/', rtrim( HOME_URL, '/' ) );
		return  strtoupper( end( $arr ) );
	}

	function _getYear() {
		date_default_timezone_set("Asia/Bangkok");
		return date("Y");
	}

	function _getLinkout( $keyword, $linkout1 ) {
		return str_replace( '%anchor_text%', urlencode( Helper::getSearchKey( $keyword ) ), $linkout1 );
	}
}