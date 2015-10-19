<?php
class ProductController extends Controller {
	function index( $params ) {
		$this->currentPage = 'product-page';
		$this->layout = PRODUCT_LAYOUT;
		$this->view = 'index';

		$this->params = $params;
	}
}