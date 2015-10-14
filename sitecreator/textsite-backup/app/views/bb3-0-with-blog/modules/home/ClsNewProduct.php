<?php

class ClsNewProduct {
	function createHtml( $products ) {
		echo '<h2>NEW PRODUCT</h2>';
		echo '<div id="new-product-content">';
		foreach ( $products as $key => $item ):
	?>
		<div class="new-product-item"><?php $this->displayItems( $item )?></div>
	<?php
		endforeach;

		echo '</div>';
	}

	function displayItems( $item ) {
		$keywordForTag = $this->_cleanDoubleQuote( $item['keyword'] );
	?>
		<div class="item-image">
			<a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>">
				<img src="<?php echo BLANK_IMG?>" data-echo="<?php echo $item['image_url']?>" alt="<?php echo $keywordForTag?>">
			</a>
		</div>
		<div class="item-price">$<?php echo $item['price']?></div>
		<hr class="hr-new-product">
		<h3><a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>"><?php echo $this->_getTitle( $item['keyword'] )?></a></h3>
	<?php
	}

	function _cleanDoubleQuote( $str ) {
		return str_replace( '"', '', $str );
	}

	function _getTitle( $keyword ) {
		return ucwords( strtolower( $keyword ) );
	}
}