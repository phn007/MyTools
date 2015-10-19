<?php
class CategoryController extends Controller {
    function category( $params ) {;
        $this->currentPage = 'category-page';
        $this->layout = CATEGORY_LAYOUT;
        $this->view = 'index';

        $this->params = $params;
        $this->catType = 'Category';
    }

    function brand( $params ) {;
        $this->currentPage = 'category-page';
		$this->layout = CATEGORY_LAYOUT;
      	$this->view = 'index';

        $this->params = $params;
        $this->catType = 'Brand';
	}
}