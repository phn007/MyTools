<?php
class ClsSearchKeyword {
	function createHtml( $data ) {
	?>
		<h3>Search Keywords</h3>
		<p><?php echo $data['lastestSearch']?></p>
	<?php
	}

}