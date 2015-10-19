<?php
include_once 'html.php';

include '_pageClass/HomePage.php';
include '_pageClass/ProductPage.php';
include '_pageClass/CategoryPage.php';
include '_pageClass/CategoriesPage.php';

switch ( $currentPage ) {
	case 'home-page':
		$obj = new HomePage();
		$module = $obj->module();
		break;

	case 'product-page':
		$obj = new ProductPage();
		$module = $obj->module( $params );
		break;

	case 'category-page':
		$obj = new CategoryPage();
		$module = $obj->module( $params, $catType );
		break;

	case 'categories-page':
		$obj = new CategoriesPage();
		$module = $obj->module( $params, $catType );
		break;
}

$data['current-page'] = $currentPage;
if ( $currentPage == 'product-page' ) {
	$data['product-detail'] = $module['productDetail'];
	$data['spin-content'] = $module['spinContent'];
}

$seoTags = $module['seoTags'];

//$header = Html::get( 'main', 'header', $data );
//$footer = Html::get( 'main', 'footer', $data );
/*
	Html::get( FunctionNmae, ID-Key, Data ); //see trait Components on html.php
*/

