<?php
include_once 'html.php';

$data['current-page'] = $currentPage;
if ( $currentPage == 'product-page' ) {
	$data['product-detail'] = $productDetail;
	$data['spin-content'] = $spinContent;
}

$header = Html::get( 'main', 'header', $data );
$footer = Html::get( 'main', 'footer', $data );


switch ( $currentPage ) {
	case 'home-page':
		$home = homePage( $productItems, $categoryList, $brandList );
		break;
	case 'product-page':
		$product = productPage( $productDetail, $spinContent, $relatedProducts, $paging, $lastestSearch );
		break;
	case 'category-page':
		$category = categoryPage( $category, $paging, $catType );
		break;
	case 'brand-page':
		$category = categoryPage( $category, $paging, $catType );
		break;
	case 'categories-page':
		$categories = categoriesPage( $categories, $paging, $catType );
		break;
	case 'brands-page':
		$categories = categoriesPage( $categories, $paging, $catType );
		break;
	case 'blog-page':
		$articles = blogPage( $articles, $pagination, $blogCategories );
		break;
	case 'blog-category-page':
		$articles = blogCategoryPage( $articles, $pagination, $blogCategories );
		break;
	case 'blog-article-page':
		$article = blogArticlePage( $article, $blogCategories );
		break;
	case 'brand-index-page':
		$brands = brandIndexPage( $brands );
		break;
	case 'cat-by-brand-page':
		$catByBrandList = catByBrandPage( $catByBrandList );
		break;
	case 'product-by-cat-page':
		$product = productByCatPage( $productList, $pagination );
		break;
	case 'shop-page':
		$categoryGroup = shopPage( $categoryGroup );
		break;
}

/**
 * FUNCTIONS SECTION
 * ----------------------------------------------------------------------------------------------------------
*/

/*
	Html::get( FunctionNmae, ID-Key, Data ); //see trait Components on html.php
*/

function homePage( $productItems=null, $categoryList=null, $brandList=null ) {
	foreach ( $productItems['group-one'] as $items );
	$cycleProducts = array_splice( $items, 0, 3 );

	return array(
		'cycleSlideShow' => Html::get( 'homePage', 'cycleSlideShow', $cycleProducts ),
		'newProduct' => Html::get( 'homepage', 'newProduct', $items ),
		'articleList' => Html::get( 'homepage', 'articleList', null )
	);
}

function productPage( $productDetail, $spinContent, $relatedProducts, $paging, $lastestSearch ) {
	$productDetailData = array( 'detail' => $productDetail, 'spin' => $spinContent );
	$searchKeyword = array( 'lastestSearch' => $lastestSearch, 'productDetail' => $productDetail );
	return array(
		'breadcrumb' => Html::get( 'productPage', 'breadcrumb', $productDetail ),
		'productDetail' => Html::get( 'productPage', 'productDetail', $productDetailData ),
		'relatedProducts' => Html::get( 'productPage', 'relatedProducts', $relatedProducts),
		'pagination' => Html::get( 'productPage', 'pagination', $paging ),
		//'searchKeyword' => Html::get( 'productPage', 'searchKeyword', $searchKeyword ),
	);
}

function categoryPage( $category, $paging, $catType ) {
	$params = array( 'categoryItems' => $category, 'catType' => $catType );
	return array(
		'items' => Html::get( 'categoryPage', 'categoryItems', $params ),
		'pagination' => Html::get( 'categoryPage', 'pagination', $paging )
	); 
}

function categoriesPage( $categories, $paging, $catType ) {
	$params = array( 'categoryItems' => $categories, 'catType' => $catType );
	return array(
		'links' => Html::get( 'categoriesPage', 'categories', $params ),
		'pagination' => Html::get( 'categoriesPage', 'pagination', $paging ),
	);
}

function blogPage( $articles, $pagination, $blogCategories ) {
	return array(
		'list' => Html::get( 'blogPage', 'articleList', $articles ),
		'categoryList' => Html::get( 'blogPage', 'categoryList', $blogCategories ),
		'pagination' => Html::get('blogPage', 'pagination', $pagination )
	);
}

function blogCategoryPage( $articles, $pagination, $blogCategories ) {
	return array(
		'list' => Html::get( 'blogPage', 'articleList', $articles ),
		'categoryList' => Html::get( 'blogPage', 'categoryList', $blogCategories ),
		'pagination' => Html::get('blogPage', 'pagination', $pagination )
	);
}

function blogArticlePage( $article, $blogCategories ) {
	return array( 
		'article' => Html::get( 'blogArticlePage', 'article', $article ),
		'categoryList' => Html::get( 'blogArticlePage', 'categoryList', $blogCategories)
	);
}

function brandIndexPage( $brands ) {
	return array( 'list' => Html::get( 'brandIndexPage', 'brandIndex', $brands ) );
}

function catByBrandPage( $catByBrandList ) {
	return array( 'list' => Html::get( 'brandIndexPage', 'catByBrand', $catByBrandList ) );
}

function productByCatPage( $productList, $pagination ) {
	return array( 
		'list' => Html::get( 'brandIndexPage', 'productList', $productList ),
		'pagination' => Html::get( 'brandIndexPage', 'pagination', $pagination )
	);
}

function shopPage( $categoryGroup ) {
	return array(
		'list' => Html::get( 'shopPage', 'categoryGroup', $categoryGroup )
	);
}

