<?php
class CategoriesController extends Controller {
	function categories( $params ) {
		$this->currentPage = 'categories-page';
		$this->layout = CATEGORIES_LAYOUT;
      	$this->view = 'index';

            $this->params = $params;
            $this->catType = 'Categories';
	}

	function brands( $params ) {
		$this->currentPage = 'categories-page';
		$this->layout = CATEGORIES_LAYOUT;
      	$this->view = 'index';

            $this->params = $params;
            $this->catType = 'Brands';
	}
}