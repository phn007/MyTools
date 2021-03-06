<?php
trait Permalink {	
	function getPermalink( $productFile, $productKey ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'productFile' => $productFile,
			'productKey' => $productKey . FORMAT,
		);
		return implode( '/', $url );
	}
}

trait CategoryLink {	
	function getCategoryLink( $typeName, $filename, $pageNumber ) {
		if ( $typeName == 'category' )
			$typeName = 'category';

		if ( $typeName == 'brand' )
			$typeName = 'brand';

		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'categoryTypeName' => $typeName,
			'currentPage' => $pageNumber,
			'categoryFilename' => $filename . FORMAT,
		);
		return implode( '/', $url );
	}	
}

trait CategoriesLink {
	function getCategoriesLink( $typeName, $pageNumber ) {
		if ( $typeName == 'categories' )
			$catname = 'categories';
		if ( $typeName == 'brands' )
			$catname = 'brands';

		$url = array(
		'homeUrl' => rtrim( HOME_URL, '/' ),
		'CategoryName' => $typeName,
		'pageNumber' => $pageNumber . FORMAT
		);
		return implode( '/', $url );
	}
}

trait GotoLink {
	function getGotoLink( $productFile, $productKey, $affiliateUrl, $permalink ) {
		if ( 'textsite' == SITE_TYPE ) return $this->textSiteLink( $productFile, $productKey );
		if ( 'htmlsite' == SITE_TYPE ) return $this->htmlSiteLink( $affiliateUrl, $permalink );	
	}

	function textSiteLink( $productFile, $productKey ) { //goto shop url
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'goto' => 'goto',
			'productFile' => $productFile,
			'productKey' => $productKey
		);
		return implode( '/', $url );
	}

	function htmlSiteLink( $affiliateUrl, $permalink ) { //direct to merchant url
		if ( NETWORK == 'prosperent-api' ) return $this->prosperentApi( $affiliateUrl, $permalink ); //networkLink_trait.php - ProsperentAPI Trait
		if ( NETWORK == 'viglink' ) return $this->viglink( $affiliateUrl ); //networkLink_trait.php - Viglink Trait
	}
}
