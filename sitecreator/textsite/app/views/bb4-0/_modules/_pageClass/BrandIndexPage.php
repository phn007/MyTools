<?php
class BrandIndexPage extends Controller {
	function module( $params ) {
		$model = $this->model( 'brandIndex/brandindex' );
		$brands = $model->getBrandByIndex( $params );

		$model = $this->model( 'brandIndex/brandIndexSeoTags' );
		$seoTags = $model->indexSeoTags();

		return array( 
			'list' => Html::get( 'brandIndexPage', 'brandIndex', $brands ),
			'seoTags' => $seoTags
		);
	}
}