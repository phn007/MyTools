<?php
//include APP_PATH . 'traits/link_trait.php';

class ProductByCategoryModel {
	use Permalink;

	function getProductList(  $brandname, $currentPage, $productFile  ) {
		$productPath = $this->getProductPath( $productFile );
		$files = $this->readContentFromTextFile( $productPath );
		$files = $this->getContentByBrandname( $files, $productFile, $brandname );

		$files = $this->splitArrayIntoChunks( $files );
		$lastPage = $this->getTotalPage( $files );
		$files = $this->getContentFromCurrentPage( $files, $currentPage );

		return array( 
			'productList' => array( 'list' => $files, 'brandname' => $brandname, 'productFile' => $productFile ),
			'lastPage' => $lastPage 
		);
	}

	function getContentFromCurrentPage( $files, $currentPage ) {
		$i = 1;
		foreach ( $files as $file ) {
			$result[$i] = $file;
			$i++;
		}
		return $result[$currentPage];
	}

	function getTotalPage( $files ) {
		return count( $files );
	}

	function splitArrayIntoChunks( $files ) {
		return array_chunk ( $files, PRODUCT_BY_CAT_NUMBER_PER_PAGE, true );

	}

	function getContentByBrandname( $files, $productFile, $brandname ) {
		foreach ( $files as $productKey => $item ) {
			$brandnameFromFile = strtolower( $item['brand'] );
			$brandnameFromParam = strtolower( $brandname );

			if ( $brandnameFromFile == $brandnameFromParam ) {
				$item['permalink'] = $this->getPermalink( $productFile, $productKey );
				$items[$productKey] = $item;
			}
		}
		return $items;
	}

	function readContentFromTextFile( $path ) {
		return unserialize( file_get_contents( $path ) );
	}

	function getProductPath( $productFile ) {
		return CONTENT_PATH . 'products/' . $productFile . '.txt'; 
	}
}