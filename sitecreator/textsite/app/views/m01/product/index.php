<?php
	extract( $module['productDetail'] );
	$title = str_replace( '"', '', $keyword );

?>

<div class="main-container">

<?php //=============================== BREADCRUMB ================================ ?>
	<section class="breadcrumb">
		<a title="<?php echo HOME_URL?>" href="<?php echo HOME_URL?>">Home</a>
		<a title="<?php echo $category?>" href="<?php echo $categoryLink?>"><?php echo $category?></a>
		<a title="<?php echo $title?>" href="<?php echo $permalink?>"><?php echo $keyword?></a>
	</section>
	
<?php //================================= PRODUCT DETAIL ============================?>
	<section class="main-product">
		<div class="image"><?php image( $image_url, $keyword, $goto )?></div>
		<div class="info">
			<h1><?php title( $goto, $keyword )?></h1>
			<?php social( $permalink, $keyword );?>
			<div class="brand"><?php brand( $brandLink, $brand )?></div>
			<hr>
			<div class="price">$<?php echo $price?></div>
			<div class="button">
				<span id="butt">
					<?php button( $goto, $keyword )?>
				</span> 
			</div>
			<hr>
			<p class="desc"><?php echo $description?></p>
		</div>	
	</section>

	<div id="cat-bottom"></div>


<?php 
//PRODUCT DETAIL FUNCTION SECTION
function image( $image_url, $keyword, $goto ) {
	$title = cleanDoubleQuote( $keyword );
?>
	<a rel="nofollow" title="<?php echo $title?>" href="<?php echo $goto?>">
		<img src="<?php echo $image_url ?>" alt="<?php echo $title?>">
	</a>
<?php
}

//CONTENT
function title( $goto, $keyword ) {
	$title = cleanDoubleQuote( $keyword );
?>
	<a rel="nofollow" title="<?php echo $title?>" href="<?php echo $goto?>"><?php echo $keyword?></a>
<?php
}

function brand( $brandLink, $brand ) { ?>
	<a title="<?php echo $brandLink?>" href="<?php echo $brandLink?>"><?php echo $brand?></a>
<?php
}

function button( $goto, $keyword ) { 
	$title = cleanDoubleQuote( $keyword );
?>
	<a rel="nofollow" title="<?php echo $title?>" href="<?php echo $goto ?>">VISIT STORE</a>
<?php
}
function cleanDoubleQuote( $str ) {
	return str_replace( '"', '', $str );
}

//SOCAIL

function social( $permalink, $keyword ) {
?>
	<ul class="product-social">
		<li class="facebook">
			<a rel="nofollow" href="<?php echo prodFacebook( $permalink )?>"><i class='icon fa fa-facebook'></i>Share</a>
		</li>
		<li class="twitter">
			<a rel="nofollow" href="<?php echo prodTwitter( $permalink )?>"><i class='icon fa fa-twitter'></i>Tweet</a>
		</li>
		<li class="google-plus">
			<a rel="nofollow" href="<?php echo prodGooglePlus( $permalink, $keyword )?>"><i class='icon fa fa-google-plus'></i>Google+</a>
		</li>
		<li class="pinterest">
			<a rel="nofollow" href="<?php echo prodPinterest( $permalink, $keyword )?>"><i class='icon fa fa-pinterest'></i>Pinterest</a>
		</li>
	</ul>
<?php
}

function prodFacebook( $permalink ) {
	return 'http://www.facebook.com/share.php?u=' . $permalink;
}
function prodTwitter( $permalink ) {
	return 'http://twitter.com/share?text=' . $permalink;
}
function prodGooglePlus( $permalink, $keyword ) {
	$title = getTitle( $keyword );
	return 'http://www.google.com/bookmarks/mark?op=add&bkmk=' . $permalink . '&title=' . $title;
}
function prodPinterest( $permalink, $keyword ) {
	$title = getTitle( $keyword );
	return 'http://pinterest.com/pin/create/button?url=' . $permalink . '&amp;title=' . $title;

}
function getTitle( $keyword ) {
	return  rawurlencode( $keyword );
}
?>


<?php //================================= RELATED PRODUCT ============================?>

<?php 
class RelatedProduct {
	use CategoryLink;

	function getBrandLink( $brand) {
		//echo HOME_URL . 'brand/' . Helper::clean_string( $brand ) . FORMAT;

		echo $this->getCategoryLink( 'brand',  Helper::clean_string( $brand ), 1 );
	}

	function headTitle( $keyword ) {
		$title = strtolower( $keyword );
		echo ucwords( $title );
	}

	function titleForTag( $keyword ) {
		echo str_replace( '"', '', $keyword );
	}

	function showImage( $image_url, $keyword ) {
		$alt = str_replace( '"', '', $keyword );
		echo '<img src="' . BLANK_IMG . '" data-echo="' . $image_url . '" alt="' . $alt . '">';
	}
}
?>


	<section class="related">
		<h2><span id="relate-title">You May Also Like</span></h2>
		<div class="related-content">
			
		<?php 
		$obj = new RelatedProduct();

		foreach ( $module['relatedProducts'] as $product ): 
				extract( $product );
		?>
			<div class="item">
				<a title="<?php $obj->titleForTag( $keyword )?>" rel="nofollow" href="<?php echo $goto?>"><?php $obj->showImage( $image_url, $keyword )?></a>
				<h3><a title="<?php $obj->titleForTag( $keyword )?>" rel="nofollow" href="<?php echo $goto?>"><?php $obj->headTitle( $keyword )?></a></h3>
				<div class="brand">
					<a title="<?php echo $brand?>" rel="nofollow" href="<?php $obj->getBrandLink( $brand) ?>"><?php echo $brand?></a>
				</div>
				<div class="price">$<?php echo $price?></div>
			</div>
		<?php endforeach ?>

		</div>
	</section>

<?php //================================= SEO  ============================?>

	<section class="product-info">
		<h2><?php echo $keyword?></h2>
		<ul class="accordion-tabs-minimal">
		  <li class="tab-header-and-content">
		    <a href="#" class="tab-link is-active">Search Keywords</a>
		    <div class="tab-content">
		      <p><?php echo $module['lastestSearch']?></p>
		    </div>
		  </li>
		  <li class="tab-header-and-content">
		    <a href="#" class="tab-link">Spons</a>
		    <div class="tab-content">
		      <p><?php ads1( $module )?></p>
		    </div>
		  </li>
		  <li class="tab-header-and-content">
		    <a href="#" class="tab-link">Ads</a>
		    <div class="tab-content">
		      <p><?php ads2( $module )?></p>    
		    </div>
		  </li>
		  <li class="tab-header-and-content">
		    <a href="#" class="tab-link">Video</a>
		    <div class="tab-content">
		      <p><?php video( $keyword )?></p>
		    </div>
		  </li>
		</ul>
	</section>


<?php
	function video( $keyword ) {
		$iframe = '<h4>' . ucfirst( Helper::getSearchKey( $keyword ) ) . ' Related VDO</h4>';
      	$iframe .= '<iframe width="100%" height="400" ';
     	$iframe .= 'src="http://youtube.com/embed?listType=search;list=' . Helper::getSearchKey( $keyword ) . '" frameborder="0">';
      	$iframe .= '</iframe>';
      	echo $iframe;
	}

	function ads1( $content ) {
		extract( $content['spinContent'] );
	?>
		<div class="ad">
			<h3><?php echo $title1?></h3>
			<div><?php echo $ad1?></div>
			<div><?php echo $ad_desc?></div>
			<div><?php echo $more_info1?></div>
		</div>
		
	<?php
	}

	function ads2( $content ) {
		extract( $content['spinContent'] );
	?>
		<div class="ad">
			<h3><?php echo $title2?></h3>
			<div><?php echo $ad2?></div>
			<div><?php echo $more_info2?></div>
		</div>
	<?php
	}
?>




<?php // ================================= PAGINATION  ============================ //

	extract( $module['pagination']['url'] );
	extract( $module['pagination']['state'] );
?>

	<section>
		<div class="pagination">
			<ul>
			<li><?php createLink( $first, $firstUrl, 'First' );?></li>
			<li><?php createLink( $prev, $prevUrl, 'Prev' );?></li>
			<li><?php createLink( $next, $nextUrl, 'Next' );?></li>
			<li><?php createLink( $last, $lastUrl, 'Last' );?></li>
		</ul>
		</div>
	</section>



<?php

function createLink( $state, $url, $label ) {
	$class = null;
	if ( ! $state ) {
		$url = 'javascript:void(0)';
		$class = 'class="disabled"';
	}
	echo '<a ' . $class . ' href="' . $url . '">' . $label . '</a>';
}

?>
</div><!-- Main Container -->
