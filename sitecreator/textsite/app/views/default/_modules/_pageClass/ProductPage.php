<?php
class ProductPage extends Controller {
	function module( $params ) {
		$model = $this->model( 'product' );
		$model->defineParameter( $params );

		$model->getProductDetail();
		$productDetail = $model->productDetail;

		$model->getSpinContent();
		$spinContent = $model->spinContent;

		$model->getLastestSerach();
		$lastestSearch = $model->lastestSearch;

		$model->getRelatedProducts();
		$relatedProducts = $model->relatedProducts;

		$model->getPagination();
		$paging = array( 'url' => $model->pagingUrl, 'state' => $model->pagingState );

		$seoTags = $model->getSeoTags();

		return array(
			'productDetail' => $productDetail,
			'relatedProducts' => $relatedProducts,
			'pagination' => $paging,
			'spinContent' => $spinContent,
			'lastestSearch' => $lastestSearch,
			'seoTags' => $seoTags
		);
	}
}