<?php
class ClsArticleList {
	function createHtml( $articles ) {
				foreach ( $articles as $key => $article ): 
	?>
		<div id="blog-list">
		<h2><a href="<?php echo $article['link']?>"><?php echo $key?></a></h2>
		<p>
			Category: <?php echo $article['catName']?>, 
			Date: <?php echo $article['date']?>
		</p>
		<p><?php echo $article['description']?></p>
		<p><a href="<?php echo $article['link']?>">Read more...</a></p>
		</div>
	<?php 
		endforeach;
	}
}