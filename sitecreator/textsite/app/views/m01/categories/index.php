<?php
$catItems = $module['categoryItems'];
$catType = $module['catType'];

?>

<section class="categories main-container">
	<h2><?php echo $catType?></h2>
	<div class="link-content">
		<?php 
		foreach ( $catItems as $catName => $url ) {
			echo '<div class="item">';
			echo '<a href="' . $url . '">' . $catName . '</a>';
			echo '</div>';
		}
		?>
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
