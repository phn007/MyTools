<?php
class ClsArticle {
	function createHtml( $data ) {
	?>
		<h2><?php echo $data['title']?></h2>
		<p>Category: <?php echo $data['catName']?>, Date: <?php echo $data['date']?></p>
		<?php echo $data['content']?>
	<?php
	}
}