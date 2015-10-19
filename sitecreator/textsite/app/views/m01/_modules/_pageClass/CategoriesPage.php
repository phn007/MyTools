<?php
class CategoriesPage extends Controller {
	function module( $params, $catType ) {
		$model = $this->model( 'categories' );

		if ( $catType == 'Categories' )
      		$categories = $model->getCategoryList( $params );

      	if ( $catType == 'Brands' )
      		$categories = $model->getBrandList( $params );

      	$paging = $model->getPagination( $params );
      	$seoTags = $model->getSeoTags( $paging, $categories, $catType, $params );

		return array(
			'categoryItems' => $categories,
			'catType' => $catType,
			'pagination' => $paging,
			'seoTags' => $seoTags
		);
	}
}