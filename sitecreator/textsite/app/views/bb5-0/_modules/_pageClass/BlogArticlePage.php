<?php
class BlogArticlePage extends Controller {
	function module( $params ) {
		$model = $this->model( 'blog/articleContent' );
		$article = $model->getContent( $params );

		$model = $this->model( 'blog/articleCategory' );
		$blogCategories = $model->getArticleCategory();

		$catName = $params[0];
		$articleName = str_replace( array('_', FORMAT ), array( ' ', '' ) ,$params[1] );
		$model = $this->model( 'blog/seoTagsBlog' );
		$seoTags = $model->seoTagsArticle( $catName, $articleName );

		return array(
			'title' => $article['title'],
			'content' => $article['content'],
			'catname' => $article['catName'],
			'date' => $article['date'],
			'blogCategoryList' => Html::get( 'blogPage', 'blogCategoryList', $blogCategories ),
			'seoTags' => $seoTags
		);
	}
}