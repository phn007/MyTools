<?php
class BlogCategoryPage extends Controller {
	function module( $params ) {
		$catName = str_replace( FORMAT, '', urldecode( $params[1] ) );
		$currentPage = $params[0];

		$model = $this->model( 'blog/articleList' );
		$model->articlePath = BASE_PATH . 'articles/' . $catName;
		$result = $model->getArticleList( $currentPage );
		$articles = $result['articles'];

		$model = $this->model( 'blog/articlePaginator' );
		$model->pageType = 'blog-category-page';
		$model->catName = $catName;
		$pagination = $model->setPagination( $currentPage, $result['lastPage'] );

		$model = $this->model( 'blog/articleCategory' );
		$blogCategories = $model->getArticleCategory();


		$model = $this->model( 'blog/seoTagsBlog' );
		$seoTags = $model->seoTagsCategory( $catName );

		return array(
			'articleList' => Html::get( 'blogPage', 'articleList', $articles ),
			'blogCategoryList' => Html::get( 'blogPage', 'blogCategoryList', $blogCategories ),
			'blogPagination' => Html::get( 'blogPage', 'blogPagination', $pagination ),
			'seoTags' => $seoTags
		);
	}
}