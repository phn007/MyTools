<?php
class ShopController extends Controller {
	function index() {
		$this->currentPage = 'shop-page';
		$this->layout = SHOP_LAYOUT;
		$this->view = 'index';
	}
}