<?php
class ClsLinks {
	function createHtml( $data ) {
		$catItems = $data['categoryItems'];
		$catType = $data['catType'];
		$alphas = $this->createAlphaArray();
		$categories = $this->getCategories( $alphas, $catItems );

		echo '<h2>' . strtoupper( $catType ) . '</h2>';

		
		foreach ( $alphas as $alpha ) {
			echo '<h3>' . strtoupper( $alpha ) . '</h3>';
			echo '<div class="categories-link-content">';
			$this->displayItems( $categories[$alpha] );
			echo '</div>';
		}
	}

	function displayItems( $catItems ) {
		if ( !empty( $catItems ) ) {
			foreach ( $catItems as $item ) {
				echo '<div class="categories-link-item">';
				echo '<a title="'. $item['name'] .'" href="' . $item['url'] . '">' . $item['name'] . '</a>';
				echo '</div>';
			}
		}

	}

	function getCategories( $alphas, $catItems ) {
		foreach ( $alphas as $alpha ) {
			foreach ( $catItems as $catName => $url ) {
				$firstLetter = substr( trim( strtolower( $catName ) ), 0, 1 );
				if ( !empty( $firstLetter ) ) {
					if ( $alpha == "#" ) {
						if ( is_numeric( $firstLetter ) ) {
							$categories[$alpha][] = array( 'name' => $catName, 'url' => $url );
						}
					} else { 
						if ( $firstLetter == $alpha ) {
							$categories[$alpha][] = array( 'name' => $catName, 'url' => $url );
						}
					}
				}
			}
		}

		return $categories;
	}

	function createAlphaArray() {
		$alphas = range('a', 'z');
		array_unshift( $alphas,"#" );
		return $alphas;
	}
}