<?php

class BrandIndexModel extends AppComponent {

	function getBrandByIndex( $params ) {
		$alpha = strtolower( $params[0] );
		$path = $this->getPath();
		$files = unserialize( file_get_contents( $path ) );
		$brands = array();

		if ( $alpha != 'num' )
			$brands = $this->getBrandByAlphabet( $files, $alpha );
		else
			$brands = $this->getBrandByNumberic( $files, $alpha );

		return array( 'alpha' => $alpha, 'brands' => $brands );
	}


	function getBrandByAlphabet( $files, $alpha ) {
		foreach ( $files as $key => $data ) {
			if ( substr( $key, 0, 1) == $alpha ) {
				$name = strtolower( $data['name'] );
				$name = ucwords( $name );
				$result[$name] = $key;
			}
		}

		if ( !empty( $resutl ) )
			ksort( $result );

		return $result;
	}

	function getBrandByNumberic( $files, $alpha ) {
		foreach ( $files as $key => $data ) {
			if ( is_numeric( substr( $key, 0, 1) ) ) {
				$name = strtolower( $data['name'] );
				$name = ucwords( $name );
				$result[$name] = $key;
			}
		}
		ksort( $result );
		return $result;
	}

	function getPath() {
		return CONTENT_PATH . 'brands.txt';
	}
}