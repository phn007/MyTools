<?php
class ClsArticleList {
	function createHtml() {
		$obj = new ArticleListAddon();
		$articles = $obj->getArticleList();

		echo '<hr id="hr-article">';
		echo '<h2 id="blog-head">BLOG </h2>';

		foreach ( $articles as $key => $item ):
	?>
			<div class="article-item">
				<h2><a href="<?php echo $item['link']?>"><?php echo $key ?></a></h2>
				<p class="category">Category: <?php echo $item['catName']?>, Date: <?php echo $item['date']?></p>
				<p class="description"><a href="<?php echo $item['link']?>"><?php echo $item['description']?></a></p>
			</div>

	<?php
		endforeach;
	}
}