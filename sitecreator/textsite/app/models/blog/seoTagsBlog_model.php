<?php

class SeoTagsBlogModel extends AppComponent {
	function seoTagsBlog() {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => 'Blog - ' . SITE_NAME,
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}

	function seoTagsArticle(  $catName, $articleName ) {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => $articleName . ' - ' . $catName,
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}

	function seoTagsCategory( $catName ) {
		$seoCom = $this->component( 'seoTags' );
		$tags = array(
			'title' => $catName . ' - Article Category',
			//'description' => SITE_DESC,
			'author' => AUTHOR,
			//'robots' => 'index, follow'
		);
		return $seoCom->createSeoTags( $tags );
	}
}