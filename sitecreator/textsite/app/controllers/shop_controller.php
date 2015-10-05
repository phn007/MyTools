<?php
class ShopController extends Controller {
	function index() {
		$this->currentPage = 'shop-page';
		$this->layout = SHOP_LAYOUT;
		$this->view = 'index';
		
		$model = $this->model( 'home' );
		if ( ! $model->checkProductContentExist() ) return false;
		$productItems = $model->homeProducts();
		$this->categoryGroup = $productItems['category-group'];

		$this->seoTags = null;
	}
}