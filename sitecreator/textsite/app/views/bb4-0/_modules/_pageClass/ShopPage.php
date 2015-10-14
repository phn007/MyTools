<?php

class ShopPage extends Controller {
	function module() {
		$model = $this->model( 'home' );
		if ( ! $model->checkProductContentExist() ) return false;
		$productItems = $model->homeProducts();
		$categoryGroup = $productItems['category-group'];

		$model = $this->model( 'shop/shopSeoTags' );
		$seoTags = $model->seoTags();

		return array(
			'list' => Html::get( 'shopPage', 'categoryGroup', $categoryGroup ),
			'seoTags' => $seoTags
		);
	}
}