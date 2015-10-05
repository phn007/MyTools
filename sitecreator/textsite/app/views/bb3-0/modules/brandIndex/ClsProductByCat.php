<?php
class ClsProductByCat {
	use BrandIndexLink; //see Link trait File

	function createHtml( $data ) {
	?>
		<div id="product-by-cat-content">
			<h2><?php $this->_brand( $data['brandname'] )?> > <?php $this->_category( $data['productFile'] ) ?></h2>
			<?php $this->displayItems( $data['list'] )?>
		</div>

	<?php
	}

	function _category( $productFile ) {
		$catname = str_replace( '-', ' ', $productFile );
		$catname = str_replace( 'amp', '&', $catname );
		$catname = ucwords( $catname );
		echo $catname;
	}

	function _brand( $brand ) {
		$brandSlug = helper::clean_string( $brand );
		$brandLink = $this->getCategoryByBrand( $brandSlug );
		echo '<a href="'. $brandLink .'">'. $brand .'</a>';
	}

	function displayItems( $data ) {
		foreach ( $data as $key => $item ):
			$keywordForTag = $this->_cleanDoubleQuote( $key );
	?>
		<div class="product-by-cat-item">
			<div class="item-image">
				<a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>">
					<img src="<?php echo BLANK_IMG?>" data-echo="<?php echo $item['image_url']?>" alt="<?php echo $keywordForTag?>">
				</a>
			</div>
			<div class="item-price">$<?php echo $item['price']?></div>
			<hr class="hr-product-by-cat">
			<h3>
				<a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>">
					<?php echo $this->_getTitle( $item['keyword'] )?>
				</a>
			</h3>
		</div>
	<?php
		endforeach;
	}

	function _cleanDoubleQuote( $str ) {
		return str_replace( '"', '', $str );
	}

	function _getTitle( $keyword ) {
		return ucwords( strtolower( $keyword ) );
	}
}