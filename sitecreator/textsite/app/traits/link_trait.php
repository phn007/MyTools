<?php
trait Permalink {	
	function getPermalink( $productFile, $productKey ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'shop' => 'shop',
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
			'shop' => 'shop',
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
		'shop' => 'shop',
		'CategoryName' => $typeName,
		'pageNumber' => $pageNumber . FORMAT
		);
		return implode( '/', $url );
	}
}

trait BrandIndexLink {
	function getAtoZLink( $letter ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'brandIndex' => 'brand-index',
			'letter' => $letter
		);
		return implode( '/', $url );
	}

	function getProductByCatLink( $brandname, $productFile, $pageNumber ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'productByCat' => 'product-by-cat',
			'brandname' => urlencode( $brandname ),
			'pageNumber' => $pageNumber,
			'productFile' => $productFile
		);
		return implode( '/', $url );
	}

	function getCategoryByBrand( $brandFilename ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'catByBrand' => 'cat-by-brand',
			'brandFilename' => $brandFilename . FORMAT,
		);
		return implode( '/', $url );
	}
}

trait BlogLink {
	function getBlogLink( $pageNumber ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'blog' => 'blog',
			'page' => 'page',
			'pageNumber' => $pageNumber
		);
		return implode( '/', $url );
	}

	function getBlogCategoryLink( $pageNumber, $catName ) {
		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'blog' => 'blog',
			'category' => 'category',
			'pageNumber' => $pageNumber,
			'catName' => urlencode( $catName ) . FORMAT,
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
