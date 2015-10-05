<?php
trait CategoryPaginator {
	use PageUrl;
	use PageStatus;

	function getPagination( $params, $pageNumberList, $catType ) {
		$currentPageNumber = $this->getCurrentPageNumber( $params ); //CategoryItems Trait | BrandItems Trait
		$lastPageNumber = $this->getLastPage( $pageNumberList );
		$catKey = $this->getCatKey( $params );
		return array(
			'url' => $this->getPageUrl( $catKey, $catType, $currentPageNumber, $lastPageNumber ),
			'status' => $this->getPageStatus( $currentPageNumber, $lastPageNumber )
		);
	}

	function getCatKey( $params ) {
		if ( isset( $params[1] ) )
			return $params[1];
	}

	function getLastPage( $pageNumberList ) {
		end( $pageNumberList );
		return $lastPage = key( $pageNumberList );
	}
}

trait PageStatus {
	function getPageStatus(  $currentPageNumber, $lastPageNumber ) {
		$pageStatus = $this->initialPageStatus();
		$pageStatus = $this->firstStatus( $pageStatus, $currentPageNumber );	
		$pageStatus = $this->prevStatus( $pageStatus, $currentPageNumber );	
		$pageStatus = $this->nextStatus( $pageStatus, $currentPageNumber, $lastPageNumber );
		$pageStatus = $this->lastStatus( $pageStatus, $currentPageNumber, $lastPageNumber );
		return $pageStatus;
	}

	function firstStatus( $pageStatus, $currentPageNumber ) {
		if ( $currentPageNumber <= 1 ) $pageStatus['firstStatus'] = false;
		return $pageStatus;
	}

	function prevStatus( $pageStatus, $currentPageNumber ) {
		if ( $currentPageNumber <= 1 ) $pageStatus['prevStatus'] = false;
		return $pageStatus;
	}

	function nextStatus( $pageStatus, $currentPageNumber, $lastPageNumber ) {
		if ( $currentPageNumber >= $lastPageNumber ) $pageStatus['nextStatus'] = false;
		return $pageStatus;
	}

	function lastStatus( $pageStatus, $currentPageNumber, $lastPageNumber ) {
		if ( $currentPageNumber >= $lastPageNumber ) $pageStatus['lastStatus'] = false;
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
	function getPageUrl( $catKey, $catType, $currentPageNumber, $lastPageNumber ) {
		return array(
			'firstUrl' => $this->getFirstPageUrl( $catKey, $catType, $currentPageNumber ),
			'prevUrl' => $this->getPrevpageUrl( $catKey, $catType, $currentPageNumber ),
			'nextUrl' => $this->getNextPageUrl( $catKey, $catType, $currentPageNumber, $lastPageNumber ),
			'lastUrl' => $this->getLastUrl( $catKey, $catType, $lastPageNumber ) 
		);
	}

	function getFirstPageUrl( $catKey, $catType, $currentPageNumber ) {
		return $this->createPageUrl( $catKey, $catType, 1 );
	}

	function getLastUrl( $catKey, $catType, $lastPageNumber ) {
		return $this->createPageUrl( $catKey, $catType, $lastPageNumber );
	}

	function getNextPageUrl( $catKey, $catType, $currentPageNumber, $lastPageNumber ) {
		if ( $currentPageNumber < $lastPageNumber ) {
			$nextPageNumber = $currentPageNumber + 1;
			return $this->createPageUrl( $catKey, $catType, $nextPageNumber );
		}
		return null;
	}

	function getPrevPageUrl( $catKey, $catType, $currentPageNumber ) {
		if ( $currentPageNumber > 1 ) {
			$prevPageNumber = $currentPageNumber - 1;
			return $this->createPageUrl( $catKey, $catType, $prevPageNumber );
		}
		return null;
	}

	function createPageUrl( $catKey, $catType, $pageNumber ) {
		return $this->getCategoryLink( $catType, $catKey, $pageNumber );
	}
}