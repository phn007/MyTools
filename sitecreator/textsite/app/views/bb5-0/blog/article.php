<div id="blog-container">
	<div id="blog-content">
		<div id="blog-content-left">
			<h2 id='title'><?php echo $module['title']?></h2>
			<p id="cate-detail">Category: <?php echo $module['catname']?>, Date: <?php echo $module['date']?></p>
			<p id="content"><?php echo $module['content']?></p>
		</div>
		<div id="blog-content-right">
			<?php if ( isset( $module['blogCategoryList'] ) ) echo $module['blogCategoryList'] ?>
		</div>
	</div>
</div>