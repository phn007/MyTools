<div id="blog-container">
	<div id="blog-content">
		<div id="blog-content-left"><?php if ( isset( $module['articleList']) ) echo $module['articleList'] ?></div>
		<div id="blog-content-right">
			<?php if ( isset( $module['blogCategoryList'] ) ) echo $module['blogCategoryList'] ?>
		</div>
	</div>
	<div id="blog-pagination"><?php if ( isset( $module['blogPagination'] ) ) echo $module['blogPagination'] ?></div>
</div>