<?php

class BrandIndexSeoTagsModel extends AppComponent {
	function indexSeoTags() {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => 'Brand Index - ' . SITE_NAME,
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}

	function categoryByBrandSeoTags( $brandName ) {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => $brandName . ' - Brand Index',
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}

	function productfByCategorySeoTags(  $brandname, $productFile ) {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => $brandname . ' - ' . $productFile,
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}
}