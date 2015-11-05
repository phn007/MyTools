<?php
class BlogPage extends Controller {
	function module( $params ) {
		$model = $this->model( 'blog/articleList' );
		$model->articlePath = BASE_PATH . 'articles';
		$result = $model->getArticleList( $params[0] );
		$articles = $result['articles'];

		$model = $this->model( 'blog/articlePaginator' );
		$model->pageType = 'blog-page';
		$pagination = $model->setPagination( $params[0], $result['lastPage'] );

		$model = $this->model( 'blog/articleCategory' );
		$blogCategories = $model->getArticleCategory();

		$model = $this->model( 'blog/seoTagsBlog' );
		$seoTags = $model->seoTagsBlog();
		
		return array(
			'articleList' => Html::get( 'blogPage', 'articleList', $articles ),
			'blogCategoryList' => Html::get( 'blogPage', 'blogCategoryList', $blogCategories ),
			'blogPagination' => Html::get( 'blogPage', 'blogPagination', $pagination ),
			'seoTags' => $seoTags
		);
	}
}