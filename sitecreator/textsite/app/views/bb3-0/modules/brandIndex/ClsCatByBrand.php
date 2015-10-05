<?php
class ClsCatByBrand {
	use BrandIndexLink; //see Link trait File

	function createHtml( $data ) {
		$brandIndex = new BrandIndexLinkAddon();
	?> 
		<div id="cat-by-brand-content">
			<div id="a-to-z"><?php echo $brandIndex->AToZLink()?></div>
			<h2><?php echo $data['brandname']?></h2>
			<?php $this->displayItems( $data )?>
		</div>
	<?php
	}

	function displayItems( $data ) {
		$brandname = $data['brandname'];
		$catList = $data['categoryList'];

		foreach ( $catList as $key => $filename ):
			$link = $this->getLink( $brandname, $filename );
	?>
			<div id="cat-by-brand-item">
				<a href="<?php echo $link?>"><?php echo $key?></a>
			</div>
	<?php
		endforeach;
	}

	function getLink( $brandname, $filename ) {
		return $this->getProductByCatLink( $brandname, $filename, 1 ); //see Link trait File -> BrandIndexLink trait
	}
}