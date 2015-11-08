<?php
class CategoriesPage extends Controller {
	function module( $params, $catType ) {
		$model = $this->model( 'categoriesAll' );
      	$categories = $model->getCategories($catType);
      	$seoTags = $model->getSeoTags( $paging, $categories, $catType, $params );
      	$linkParams = array( 'categoryItems' => $categories, 'catType' => $catType );
		return array(
			'links' => Html::get( 'categoriesPage', 'categories', $linkParams ),
			'seoTags' => $seoTags
		);
	}
}

