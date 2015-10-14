<?php

class ShopSeoTagsModel extends AppComponent {
	function seoTags() {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => SITE_NAME,
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}
}


