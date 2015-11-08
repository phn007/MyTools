<?php
use webtools\controller;
use webtools\libs\Helper;

class RemoveDuplicateRowModel {
	function remove( $dbs ) {
		echo "Remove Duplicate Row\n\n";
		$db = new Database();
		$conn = $db->connectDatabase();

		foreach ( $dbs as $dbname ) {
			$db->selectDatabase( $conn, $dbname );
			$db->createTmpTable( $conn, "products" );
			$db->insertIntoTmp( $conn, "products" );
			$db->dropTable( $conn, "products" );
			$db->renameTable( $conn, "products" );
			echo $dbname . "\n";
		}
	}
}

