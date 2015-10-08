<?php

class BrandIndexLinkAddon {
	use BrandIndexLink;
	
	function AToZLink() {
		$alphas = range('A', 'Z');
		echo '<ul>';
		echo '<li>Brand Index : </li>';
		echo '<li><a href="'. $this->AToZURL( 'num') .'">#</a></li>';
		foreach ( $alphas as $letter ) {
			echo '<li><a href="'. $this->AToZURL( $letter) .'">' . $letter . '</a></li>';
		}
		echo '</ul>';
	}

	function AToZURL( $letter ) {
		return $this->getAtoZLink( $letter ); // link_trait - BrandIndexLink
	}
}