<?php
class BlogController extends Controller {
	function index( $params ) {
		$this->currentPage = 'blog-page';
		$this->layout = BLOG_LAYOUT;
		$this->view = 'index';

		$model = $this->model( 'blog/articleList' );
		$model->articlePath = BASE_PATH . 'articles';
		$result = $model->getArticleList( $params[0] );
		$this->articles = $result['articles'];

		$model = $this->model( 'blog/articlePaginator' );
		$model->pageType = 'blog-page';
		$this->pagination = $model->setPagination( $params[0], $result['lastPage'] );

		$model = $this->model( 'blog/articleCategory' );
		$this->blogCategories = $model->getArticleCategory();

		$this->seoTags = null;
	}

	function article( $params ) {
		$this->currentPage = 'blog-article-page';
		$this->layout = BLOG_ARTICLE_LAYOUT;
		$this->view = 'article';

		$model = $this->model( 'blog/articleContent' );
		$this->article = $model->getContent( $params );

		$model = $this->model( 'blog/articleCategory' );
		$this->blogCategories = $model->getArticleCategory();

		$this->seoTags = null;
	}

	function category( $params ) {
		$this->currentPage = 'blog-category-page';
		$this->layout = BLOG_CATEGORY_ARTICLE_LAYOUT;
		$this->view = 'blog-category';


		$catName = str_replace( FORMAT, '', urldecode( $params[1] ) );
		$currentPage = $params[0];

		$model = $this->model( 'blog/articleList' );
		$model->articlePath = BASE_PATH . 'articles/' . $catName;
		$result = $model->getArticleList( $currentPage );
		$this->articles = $result['articles'];

		$model = $this->model( 'blog/articlePaginator' );
		$model->pageType = 'blog-category-page';
		$model->catName = $catName;
		$this->pagination = $model->setPagination( $currentPage, $result['lastPage'] );


		$model = $this->model( 'blog/articleCategory' );
		$this->blogCategories = $model->getArticleCategory();

		$this->seoTags = null;
	}
}