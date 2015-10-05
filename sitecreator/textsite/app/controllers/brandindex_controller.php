<?php

class BrandIndexController extends Controller {
	function index( $params ) {
		$this->currentPage = 'brand-index-page';
		$this->layout = BRAND_INDEX_LAYOUT;
		$this->view = 'index';

		$model = $this->model( 'brandIndex/brandindex' );
		$this->brands = $model->getBrandByIndex( $params );

		$this->seoTags = null;
	}

	function catByBrand( $params ) {
		$this->currentPage = 'cat-by-brand-page';
		$this->layout = CAT_BY_BRAND_LAYOUT;
		$this->view = 'catByBrand';

		$model = $this->model( 'brandIndex/catByBrand' );
		$this->catByBrandList = $model->getCategoryList( $params );

		$this->seoTags = null;
	}

	function productByCategory( $params ) {
		$this->currentPage = 'product-by-cat-page';
		$this->layout = PRODUCT_BY_CAT_LAYOUT;
		$this->view = 'productByCat';

		$brandname = urldecode( $params[0] );
		$currentPage = $params[1];
		$productFile = str_replace( FORMAT, '', $params[2] );

		$model = $this->model( 'brandIndex/productByCategory' );
		$result = $model->getProductList( $brandname, $currentPage, $productFile );
		$this->productList = $result['productList'];

		$model = $this->model( 'brandIndex/productByCategoryPagination');
		$this->pagination = $model->setPagination( $brandname, $productFile, $currentPage, $result['lastPage'] );

		$this->seoTags = null;
	}
}