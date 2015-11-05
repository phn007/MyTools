<?php
class BlogController extends Controller {
	function index( $params ) {
		$this->currentPage = 'blog-page';
		$this->layout = BLOG_LAYOUT;
		$this->view = 'index';
		$this->params = $params;
	}

	function article( $params ) {
		$this->currentPage = 'blog-article-page';
		$this->layout = BLOG_ARTICLE_LAYOUT;
		$this->view = 'article';
		$this->params = $params;
	}

	function category( $params ) {
		$this->currentPage = 'blog-category-page';
		$this->layout = BLOG_CATEGORY_ARTICLE_LAYOUT;
		$this->view = 'index';
		$this->params = $params;
	}
}