<?php

class ProductByCatPage extends Controller {
	function module( $params ) {
		$brandname = urldecode( $params[0] );
		$currentPage = $params[1];
		$productFile = str_replace( FORMAT, '', $params[2] );

		$model = $this->model( 'brandIndex/productByCategory' );
		$result = $model->getProductList( $brandname, $currentPage, $productFile );
		$productList = $result['productList'];

		$model = $this->model( 'brandIndex/productByCategoryPagination');
		$pagination = $model->setPagination( $brandname, $productFile, $currentPage, $result['lastPage'] );

		$productFile = ucwords( str_replace( '-', ' ', $productFile ) );
		$model = $this->model( 'brandIndex/brandIndexSeoTags' );
		$seoTags = $model->productfByCategorySeoTags( $brandname, $productFile );

		return array( 
			'list' => Html::get( 'brandIndexPage', 'productList', $productList ),
			'pagination' => Html::get( 'brandIndexPage', 'pagination', $pagination ),
			'seoTags' => $seoTags
		);
	}
}