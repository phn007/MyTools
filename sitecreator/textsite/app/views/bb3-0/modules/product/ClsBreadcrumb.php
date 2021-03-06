<?php
class ClsBreadcrumb {
	use BrandIndexLink;

	function createHtml( $data = null ) {
	?>
		<div id="breadcrumb-container">
			<h1><?php $this->productName( $data )?></h1>
			<div id="breadcrumb"><?php $this->breadcrumb( $data )?></div>
		</div>
	<?php
	}

	function productName( $data ) {
		echo $data['keyword'];
	}

	function breadcrumb( $data ) {
		extract( $data );
		$this->_home();
		echo ' > ';
		$this->_brand( $brand);
		echo ' > ';
		$this->_product( $keyword, $permalink );
	}

	function _home() {
		echo '<a title="' . HOME_URL . '" href="' . HOME_URL . '">Home</a>';
	}

	function _category( $category, $categoryLink ) {
		echo '<a title="' . $category . '" href="' . $categoryLink . '">' . $category . '</a>';
	}

	function _product( $keyword, $permalink ) {
		$title = str_replace( '"', '', $keyword );
		echo '<a title="' . $title . '" href="' . $permalink . '">' . $keyword . '</a>';
	}

	function _brand( $brand ) {
		$brandSlug = helper::clean_string( $brand );
		$brandLink = $this->getCategoryByBrand( $brandSlug );
		echo '<a title="' . $brand . '" href="' . $brandLink . '">' . $brand . '</a>';
	}
}