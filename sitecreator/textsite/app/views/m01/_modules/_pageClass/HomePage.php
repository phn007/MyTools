<?php
class HomePage extends Controller {
	function module() {
		$model = $this->model( 'home' );
		$productItems = $model->homeProducts();

		//foreach ( $productItems['group-one'] as $items );
		//$cycleProducts = array_splice( $items, 0, 3 );

		return array(
			'productItems' => $productItems,
			'seoTags' => $seoTags = $model->homeSeoTags()
		);
	}
}