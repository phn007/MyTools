<?php
//include APP_PATH . 'traits/link_trait.php';

class ArticleCategoryModel extends AppComponent {
	use BlogLink;

	function getArticleCategory() {
		$path = BASE_PATH . 'articles';

		$iterator = new DirectoryIterator( $path );
		foreach ( $iterator as $fileinfo ) {
		    if ( $fileinfo->isDir() ) {
		    	if( $fileinfo->isDot() ) continue;

		    	$catName = $fileinfo->getFilename();
		    	$link = $this->getLink( $catName );
		    	$cat[$catName] = $link;
		    }
		}
		return $cat;
	}

	function getLink( $catName ) {
		$pageNumber = 1;
		return $this->getBlogCategoryLink( $pageNumber, $catName );
	}
}