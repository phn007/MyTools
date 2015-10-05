<?php
//include APP_PATH . 'traits/link_trait.php';

class ArticlePaginatorModel extends AppComponent {
	use PageUrl;
	use PageStatus;

	use BlogLink; //link trait

	function __set( $name, $value ) {
      	$this->{$name} = $value;
 	}

   	function __get( $name ) {
      	return $this->{$name};
   	}

	function setPagination( $currentPage, $lastPage ) {
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

	function lastStatus( $pageStatus, $currentPage, $lastPage ) {
		if ( $currentPage >= $lastPage ) $pageStatus['lastStatus'] = false;
		return $pageStatus;
	}

	function nextStatus( $pageStatus, $currentPage, $lastPage ) {
		if ( $currentPage >= $lastPage ) $pageStatus['nextStatus'] = false;
		return $pageStatus;
	}

	function prevStatus( $pageStatus, $currentPage ) {
		if ( $currentPage <= 1 ) $pageStatus['prevStatus'] = false;
		return $pageStatus;
	}

	function firstStatus( $pageStatus, $currentPage ) {
		if ( $currentPage <= 1 ) $pageStatus['firstStatus'] = false;
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
		 	'firstUrl' => $this->createURL( 1 ),
		 	'prevUrl' => $this->prevPageUrl( $currentPage ),
		 	'nextUrl' => $this->nextPageUrl( $currentPage, $lastPage ),
		 	'lastUrl' => $this->createURL( $lastPage )
		 );
	}

	function prevPageUrl( $currentPage ) {
		$prevPage = $currentPage;

		if ( $currentPage > 1 ) {
			$prevPage = $currentPage - 1;
		}
		return $this->createURL( $prevPage );
	}

	function nextPageUrl( $currentPage, $lastPage ) {
		if ( $currentPage < $lastPage ) {
			$nextPage = $currentPage + 1;
			return $this->createURL( $nextPage );
		}
		return null;
	}

	function createURL( $pageNumber ) {
		if ( $this->pageType == 'blog-page')
			return $this->blogUrl( $pageNumber );

		if ( $this->pageType == 'blog-category-page' )
			return $this->blogCategoryUrl( $pageNumber ); 
	}

	function blogUrl( $pageNumber ) {
		return $this->getBlogLink( $pageNumber ); //link trait
	}

	function blogCategoryUrl( $pageNumber ) {
		return $this->getBlogCategoryLink( $pageNumber, $this->catName ); //link trait
	}
}