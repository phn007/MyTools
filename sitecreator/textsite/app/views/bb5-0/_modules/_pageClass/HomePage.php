<?php

/*
	Html::get( FunctionNmae, ID-Key, Data ); //see trait Components on html.php
*/

class HomePage extends Controller {
	function module() {
		$model = $this->model( 'home' );
		$productItems = $model->homeProducts();
		foreach ( $productItems['group-one'] as $items );
		$cycleProducts = array_splice( $items, 0, 3 );

		return array(
			'cycleSlideShow' => Html::get( 'homePage', 'cycleSlideShow', $cycleProducts ),
			'newProduct' => Html::get( 'homePage', 'newProduct', $items ),
			'seoTags' => $seoTags = $model->homeSeoTags()
		);
	}
}