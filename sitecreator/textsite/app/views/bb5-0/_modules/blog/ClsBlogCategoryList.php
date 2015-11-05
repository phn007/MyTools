<?php

class ClsBlogCategoryList {
	function createHtml( $list ) {
		echo '<ul> <h3>Categories</h3>';
		foreach ( $list as $key => $link ) :
	?>
		<li><a href="<?php echo $link?>"><?php echo urldecode( $key )?></a></li>
		
	<?php
		endforeach;
		echo '</ul>';
	}
}