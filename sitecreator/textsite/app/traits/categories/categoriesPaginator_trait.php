<?php
trait CategoriesPaginator {
	use PageUrl;
	use PageStatus;

	function setPagination( $params, $lastPage ) {
		$currentPage = $this->inputPageNumber( $params ); //PageNumber Trait in categories_trait.php
		return array(
			'url' => $this->getPageUrl( $currentPage, $lastPage ),
			'status' => $this->getPageStatus(  $currentPage, $lastPage )
		);
	}
}

trait PageStatus {
	function getPageStatus(  $currentPage, $lastPage ) {
		$pageStatus = $this->initialPageStatus();
		$pageStatus = $this->firstStatus( $pageStatus, $currentPage );	
		$pageStatus = $this->prevStatus( $pageStatus, $currentPage );	
		$pageStatus = $this->nextStatus( $pageStatus, $currentPage, $lastPage );
		$pageStatus = $this->lastStatus( $pageStatus, $currentPage, $lastPage );
		return $pageStatus;
	}

	function firstStatus( $pageStatus, $currentPage ) {
		if ( $currentPage <= 1 ) $pageStatus['firstStatus'] = false;
		return $pageStatus;
	}

	function prevStatus( $pageStatus, $currentPage ) {
		if ( $currentPage <= 1 ) $pageStatus['prevStatus'] = false;
		return $pageStatus;
	}

	function nextStatus( $pageStatus, $currentPage, $lastPage ) {
		if ( $currentPage >= $lastPage ) $pageStatus['nextStatus'] = false;
		return $pageStatus;
	}

	function lastStatus( $pageStatus, $currentPage, $lastPage ) {
		if ( $currentPage >= $lastPage ) $pageStatus['lastStatus'] = false;
		return $pageStatus;
	}

	function initialPageStatus() {
		return array(
			'firstStatus' => true,
			'prevStatus' => true,
			'nextStatus' => true,
			'lastStatus' => true
		);
	}
}

trait PageUrl {
	function getPageUrl( $currentPage, $lastPage ) {
		return array(
			'firstUrl' => $this->firstPageUrl( $currentPage ),
			'prevUrl' => $this->prevPageUrl( $currentPage ),
			'nextUrl' => $this->nextPageUrl( $currentPage, $lastPage ),
			'lastUrl' => $this->lastPageUrl( $currentPage, $lastPage )
		);
	}

	function firstPageUrl( $currentPage ) {
		return $this->createCategoriesUrl( 1 );
	}

	function prevPageUrl( $currentPage ) {
		$prevPage = $currentPage;

		if ( $currentPage > 1 ) {
			$prevPage = $currentPage - 1;
		}
		return $this->createCategoriesUrl( $prevPage );
	}

	function nextPageUrl( $currentPage, $lastPage ) {
		if ( $currentPage < $lastPage ) {
			$nextPage = $currentPage + 1;
			return $this->createCategoriesUrl( $nextPage );
		}
		return null;
	}

	function lastPageUrl( $currentPage, $lastPage ) {
		return $this->createCategoriesUrl( $lastPage );
	}

	function createCategoriesUrl( $pageNumber ) {
		return $this->getCategoriesLink( $this->pathType, $pageNumber ); //see Link_trait.php
	}
}