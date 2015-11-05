<?php
class CategoryPage extends Controller {
	function module( $params, $catType ) {
		$modelName = strtolower( $catType );
		$model = $this->model( $modelName );

		if ( $catType == 'Category' )
        	$category = $model->categoryItems( $params );

        if ( $catType == 'Brand' )
        	$category = $model->brandItems( $params );

        $paging = $model->pagination( $params );
        $seoTags = $model->getSeoTags( $paging, $category, $catType, $params );

        $itemParams = array( 'categoryItems' => $category, 'catType' => $catType );
		return array(
			'items' => Html::get( 'categoryPage', 'categoryItems', $itemParams ),
			'pagination' => Html::get( 'categoryPage', 'pagination', $paging ),
			'seoTags' => $seoTags
		); 
	}
}