<?php //============================ CYCLE PRODUCT LIST SECTION ========================================?>
<?php $data = getProductData( $module['productItems'] );?>
<div class="main-container">
	<section>
		<div class="cycle-slideshow" 
				data-cycle-loader=true
				data-cycle-fx="flipHorz" 
				data-cycle-timeout="3000" 
				data-cycle-pause-on-hover="true"
				data-cycle-slides="> div">
		<?php
		foreach ( $data['cycle_products'] as $item ):
		?>
		<div class="slide-item">
			<div id="slide-img">
				<a title="<?php echo $item['keyword']?>" href="<?php echo $item['permalink']?>">
					<img src="<?php echo $item['image_url']?>" alt="<?php echo $item['keyword']?>">
				</a>
				</div>
			<div id="slide-info">
				<h2><?php echo $item['keyword'] ?></h2> 
				<p><?php echo Helper::limit_words( $item['description'], 20 )?></p>
				<a title="<?php echo $item['keyword']?>" href="<?php echo $item['permalink'] ?>" class="button1">VIEW MORE</a>
				<a title="<?php echo $item['keyword']?>" href="<?php echo $item['permalink'] ?>" class="button2">VISIT STORE</a>
			</div>
		</div>	
		<?php endforeach ?>
		</div>

		<div class="recommented">
			<?php 
				$img_url1 = Helper::image_size( $data['new_products'][0]['image_url'], '125x125' );
				$img_url2 = Helper::image_size( $data['new_products'][1]['image_url'], '125x125' );
				$keyword1 = $data['new_products'][0]['keyword'];
				$keyword2 = $data['new_products'][1]['keyword'];
				$permalink1 = $data['new_products'][0]['permalink'];
				$permalink2 = $data['new_products'][1]['permalink'];
			?>
			<div id="rec1">
				<div id="rec1-info">
					<h2><?php echo $keyword1?></h2>
					<a title="<?php echo $keyword1 ?>" href="<?php echo $permalink1?>" class="button2">LEARN MORE</a>
				</div>
				<div id="rec1-img">
					<a title="<?php echo $keyword1 ?>" href="<?php echo $permalink1?>">
						<img src="<?php echo $img_url1 ?>" alt="<?php echo $keyword1 ?>">
					</a>
				</div>
			</div>

			<div id="rec2">
				<div id="rec2-img">
					<a title="<?php echo $keyword2 ?>" href="<?php echo $permalink2 ?>">
						<img src="<?php echo $img_url2 ?>" alt="<?php echo $keyword2 ?>">
					</a>
				</div>
				<div id="rec2-info">
					<h2><?php echo $keyword2 ?></h2>
					<a title="<?php echo $keyword2 ?>" href="<?php echo $permalink2 ?>" class="button1">LEARN MORE</a>
				</div>
			</div>
		</div>

	</section>
	<div style="clear:both"></div>

<?php
function getProductData( $productItems ) {
	$i = 0;
	foreach ( $productItems['group-one'] as $items ) {
		foreach ( $items as $item ) {
			if ( $i <= 2 ) 
				$cycle_products[] = $item;
			if ( $i > 2 && $i < 5 )
				$new_products[] = $item;
			$i++;
		}
	}
	return array(
		'cycle_products' => $cycle_products,
		'new_products' => $new_products
	);
}
?>


<?php 
//================================= PRODUCT LIST SECTION =======================================//


class ProductList {
	use CategoryLink;

	function getTitle( $keyword ) {
		return ucwords( strtolower( $keyword ) );
	}

	function getBrandLink( $brandName ) {
		$brandName = Helper::clean_string( $brandName );
		return $this->getCategoryLink( 'brand', $brandName, 1 );
	}

	function categoryLink( $catName ) {
		$catName = Helper::clean_string( $catName );
		return $this->getCategoryLink( 'category', $catName, 1 );
	}

	function cleanDoubleQuote( $str ) {
		return str_replace( '"', '', $str );
	}
}

$productItems = $module['productItems']['category-group'];
$obj = new ProductList();

$i = 0;
foreach ( $productItems as $productFile => $items ):
	$key = key( $items );
	$catName = $items[$key]['category'];
?>
	<div class="category-title">
		<h2 class="linetext">
			<span><a href="<?php echo $obj->categoryLink( $catName )?>"><?php echo $catName?></a></span>
		</h2>
		<a href="<?php echo $obj->categoryLink( $catName )?>">Shop All</a>
	</div>
	<div class="category-items">
	<?php
		$count = 0;
		foreach ( $items as $item ):
			if ( ++$count > 3 ) break;
			$keywordForTag = $obj->cleanDoubleQuote( $item['keyword'] );
	?>
			<div class="item">
				<div class="image">
					<a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>">
						<img src="<?php echo BLANK_IMG?>" data-echo="<?php echo $item['image_url']?>" alt="<?php echo $keywordForTag?>">
					</a>
				</div>
			<div class="info">
				<h3><a title="<?php echo $keywordForTag?>" href="<?php echo $item['permalink']?>"><?php echo $obj->getTitle( $item['keyword'] )?></a></h3>
				<div class="brand">
					<a href="<?php echo $obj->getBrandLink( $item['brand'])?>"><?php echo $item['brand']?></a>
				</div>
				<div class="price">$<?php echo $item['price']?></div>
			</div>
		</div>


	<?php endforeach; ?>
	</div>	

<?php 
	$i++;
	if ( $i > 3 ) break;
endforeach; 
?>



</div><!-- Main Container-->














