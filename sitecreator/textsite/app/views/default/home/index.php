Home
<?php
	// echo "<pre>";
	// print_r( $module['productItems']['group-one']);
	// echo "</pre>";

	foreach ($module['productItems']['group-one'] as $key => $items ) {
		foreach ( $items as $title => $item ) {
			echo $title . ' -> ' . $item['price'];
			echo "<br>";
		}

	}
?>