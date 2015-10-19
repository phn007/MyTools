<?php

// ================================ CATEGORY LIST ========================================= //
class Category {
	use CategoryLink;

	function getCatLink( $item, $catType ) {
		if ( $catType == 'Category' ) {
			$link = $this->getCategoryLink( 'brand', Helper::clean_string( $item['brand'] ), 1 );
			return '<a title="' . $item['brand'] . '" href="' . $link . '">' . $item['brand'] . '</a>';
		}

		if ( $catType == 'Brand' ) {
			$link = $this->getCategoryLink( 'category', Helper::clean_string( $item['category'] ), 1 );
			return '<a title="' . $item['category'] . '" href="' . $link . '">' . $item['category'] . '</a>';
		}
	}
}

$obj = new Category();

$catName = key( $module['items'] );
$catTye = $module['cateType'];
?>

<section class="category main-container">
	<h2><?php echo ucwords( $catName )?> - <?php echo $catType?></h2>

	<div class="category-content">
	<?php foreach ( $module['items'][$catName] as $item ): 
			extract( $item );
			$keyword = ucfirst( strtolower( $keyword ) );
			$permalink = $item['permalink'];
	?>
			<div class="item">
			<a title="<?php echo $keyword?>" href="<?php echo $permalink?>"><?php echo Helper::showImage( $image_url, '250x250', $keyword )?></a>
			<h3><a href="<?php echo $permalink?>" title="<?php echo $keyword?>"><?php echo $keyword ?></a></h3>
			<div class="cat">
				<?php echo $obj->getCatLink( $item, $catType )?>
			</div>
			<div class="price">$<?php echo $price?></div>
		</div>
	<?php endforeach ?>
	</div>
</section>


<?php 
// ==================================== PAGINATION 	===================================//
extract( $module['pagination']['url'] );
extract( $module['pagination']['status'] );
?>	

<section>
	<div class="pagination">
		<ul>
			<li><?php createLink( $firstStatus, $firstUrl, 'First' );?></li>
			<li><?php createLink( $prevStatus, $prevUrl, 'Prev' );?></li>
			<li><?php createLink( $nextStatus, $nextUrl, 'Next' );?></li>
			<li><?php createLink( $lastStatus, $lastUrl, 'Last' );?></li>
		</ul>
	</div>

	<div id="cat-bottom"></div>
</section>
<?php

function createLink( $status, $url, $label ) {
	$class = null;
	if ( ! $status ) {
		$url = 'javascript:void(0)';
		$class = 'class="disabled"';
	}
	echo '<a ' . $class . ' href="' . $url . '">' . $label . '</a>';
}
?>






