<?php

class CatByBrandPage extends Controller {
	function module( $params ) {
		$model = $this->model( 'brandIndex/catByBrand' );
		$catByBrandList = $model->getCategoryList( $params );

		$brandName = str_replace( array( '-', FORMAT ), array( ' ', '' ), $params[0] );
		$brandName = ucwords( $brandName );
		$model = $this->model( 'brandIndex/brandIndexSeoTags' );
		$seoTags = $model->categoryByBrandSeoTags( $brandName );

		return array( 
			'list' => Html::get( 'brandIndexPage', 'catByBrand', $catByBrandList ),
			'seoTags' => $seoTags
		);
	}
}