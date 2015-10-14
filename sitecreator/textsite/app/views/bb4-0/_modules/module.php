<?php
include_once 'html.php';

include '_pageClass/HomePage.php';
include '_pageClass/ProductPage.php';
include '_pageClass/CategoryPage.php';
include '_pageClass/CategoriesPage.php';
include '_pageClass/BrandIndexPage.php';
include '_pageClass/CatByBrandPage.php';
include '_pageClass/ProductByCatPage.php';
include '_pageClass/ShopPage.php';


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

	case 'brands-page':
		$obj = new CategoriesPage();
		$module = $obj->module( $params, $catType );
		break;

	case 'brand-index-page':
		$obj = new BrandIndexPage();
		$module = $obj->module( $params );
		break;

	case 'cat-by-brand-page':
		$obj = new CatByBrandPage();
		$module = $obj->module( $params );
		break;

	case 'product-by-cat-page':
		$obj = new ProductByCatPage();
		$module = $obj->module( $params );
		break;

	case 'shop-page':
		$obj = new ShopPage();
		$module = $obj->module();
		break;
}

$data['current-page'] = $currentPage;
if ( $currentPage == 'product-page' ) {
	$data['product-detail'] = $module['productDetail'];
	$data['spin-content'] = $module['spinContent'];
}

$seoTags = $module['seoTags'];

$header = Html::get( 'main', 'header', $data );
$footer = Html::get( 'main', 'footer', $data );



/*
	Html::get( FunctionNmae, ID-Key, Data ); //see trait Components on html.php
*/

