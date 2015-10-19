<?php
class HomePage extends Controller {
	function module() {
		$model = $this->model( 'home' );
		$productItems = $model->homeProducts();

		return array(
			'productItems' => $productItems,
			'seoTags' => $seoTags = $model->homeSeoTags()
		);
	}
}