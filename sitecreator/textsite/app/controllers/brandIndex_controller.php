<?php

class BrandIndexController extends Controller {
	function index( $params ) {
		$this->currentPage = 'brand-index-page';
		$this->layout = BRAND_INDEX_LAYOUT;
		$this->view = 'index';

		$this->params = $params;
	}

	function catByBrand( $params ) {
		$this->currentPage = 'cat-by-brand-page';
		$this->layout = CAT_BY_BRAND_LAYOUT;
		$this->view = 'catByBrand';

		$this->params = $params;
	}

	function productByCategory( $params ) {
		$this->currentPage = 'product-by-cat-page';
		$this->layout = PRODUCT_BY_CAT_LAYOUT;
		$this->view = 'productByCat';

		$this->params = $params;
	}
}