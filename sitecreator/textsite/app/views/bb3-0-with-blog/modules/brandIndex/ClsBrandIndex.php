<?php
class ClsBrandIndex {
	use BrandIndexLink;

	function createHtml( $data ) {
		$brandIndex = new BrandIndexLinkAddon();
	?>
		<div id="a-to-z"><?php echo $brandIndex->AToZLink()?></div>
		<div id="brand-index-content">
			<h2><?php echo strtoupper( $data['alpha'] )?></h2>
			<?php $this->displayItems( $data['brands'] ) ?>
		</div>
	<?php
	}

	function displayItems( $brands ) {
		foreach ( $brands as $key => $filename ):
	?>
		<div class="brand-index-item">
			<a href="<?php echo $this->getLink( $filename )?>"><?php echo $key?></a>
		</div>
	<?php
		endforeach;
	}

	function getLink( $filename ) {
		return $this->getCategoryByBrand( $filename ); // link trait
	}
}