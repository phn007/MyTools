<?php
class CategoriesAllModel extends AppComponent {
	use CategoryLink;

	function getCategories( $pathType ) {
		if ( $pathType == 'Categories' )
			$urlType = 'category';

		if ( $pathType == 'Brands' )
			$urlType = 'brand';

		$path = $this->getPath( $pathType );
		$files = $this->readContentFromFile( $path );
		return  $this->creatCatList( $files, $urlType );
	}

	function creatCatList( $files, $urlType ) {
		foreach ( $files as $key => $file ) {
			$catName = $this->formatCategoryName( $file['name'] );
			$url = $this->createUrl( $urlType, $key );
			$data[$catName] = $url;
		}
		return $data;
	}

	function formatCategoryName( $catName ) {
		return ucwords( strtolower( $catName ) );
	}

	function createUrl( $typeName, $filename ) {
		return $this->getCategoryLink( $typeName, $filename, 1 );
	}

	function readContentFromFile( $path ) {
		return unserialize( file_get_contents( $path ) );
	}

	function getPath( $catType ) {
		return CONTENT_PATH . strtolower( $catType ) . '.txt';
	}

	function getSeoTags( $catType ) {
		$tags['title'] = $catType;
		$tags['author'] = AUTHOR;

		$tagCom = $this->component( 'seoTags' );
		return $tagCom->createSeoTags( $tags );
	}
}
