<?php

class CatByBrandModel extends AppComponent {
	function getCategoryList( $params ) {
		$indexKey = $this->getBrandKeyIndex( $params[0] );
		$brandTextPath = $this->getPath();
		$files = $this->getContentFromBrandTextFile( $brandTextPath );
		$files = $this->editContent( $files[$indexKey] );

		return $files;
	}

	function editContent( $files ) {
		foreach ( $files['items'] as $catname ) {
			$filename = $catname;
			$arr = explode( '-', $catname );

			// if ( is_numeric( end( $arr) ) ) {
			// 	$num = count( $arr );
			// 	$endNum = $num - 1;
			// 	unset( $arr[$endNum] );
			// }

			$catname = implode( ' ', $arr );
			$catname = str_replace( 'amp', '&', $catname );
			$catname = ucwords( $catname );
			$categories[$catname] = $filename;
		}
		return array( 'brandname' => $files['name'], 'categoryList' => $categories );
	}

	function getContentFromBrandTextFile( $path ) {
		return unserialize( file_get_contents( $path ) );
	}

	function getBrandKeyIndex( $key ) {
		return str_replace( FORMAT, '', $key );
	}

	function getPath() {
		return CONTENT_PATH . 'brands.txt';
	}
}
