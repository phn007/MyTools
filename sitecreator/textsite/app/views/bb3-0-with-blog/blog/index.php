<div id="blog-container">
	<div id="blog-content">
		<div id="blog-content-left"><?php if ( isset( $articles['list'] ) ) echo $articles['list'] ?></div>
		<div id="blog-content-right">
			<?php if ( isset( $articles['categoryList'] ) ) echo $articles['categoryList'] ?>
		</div>
	</div>
	<div id="blog-pagination"><?php if ( isset( $articles['pagination'] ) ) echo $articles['pagination'] ?></div>
</div>