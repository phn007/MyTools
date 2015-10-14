<?php
class CategoriesPage extends Controller {
	function module( $params, $catType ) {
		$model = $this->model( 'categories' );

		if ( $catType == 'Categories' )
      		$categories = $model->getCategoryList( $params );

      	if ( $catType == 'Brands' )
      		$categories = $model->getBrandList( $params );

      	$paging = $model->getPagination( $params );
      	$catType = 'Categories';
      	$seoTags = $model->getSeoTags( $paging, $categories, $catType, $params );

      	$linkParams = array( 'categoryItems' => $categories, 'catType' => $catType );
		return array(
			'links' => Html::get( 'categoriesPage', 'categories', $linkParams ),
			'pagination' => Html::get( 'categoriesPage', 'pagination', $paging ),
			'seoTags' => $seoTags
		);
	}
}