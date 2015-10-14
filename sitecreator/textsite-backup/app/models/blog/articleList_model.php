<?php
class ArticleListModel extends AppComponent {

	function __set( $name, $value ) {
      	$this->{$name} = $value;
 	}

   	function __get( $name ) {
      	return $this->{$name};
   	}

	function getArticleList( $currentPage ) {
		$articles = $this->readArticleFromDirectory();
		$articles = $this->SplitArticles( $articles );
		$totalPage = $this->calculateTotalArticlePage( $articles );
		$articles = $this->editArticleGroupIndex( $articles );

		return array( 
			'articles' => $articles[$currentPage],
			'lastPage' => $totalPage
		);
	}

	function editArticleGroupIndex( $articles) {
		$i = 1;
		foreach ( $articles as $article ) {
			$group[$i] = $article;
			$i++;
		}
		return $group;
	}

	function calculateTotalArticlePage( $articles ) {
		return count( $articles );
	}

	function SplitArticles( $articles ) {
		return array_chunk( $articles, 20, true );
	}

	function readArticleFromDirectory() {
		$files = new RecursiveDirectoryIterator( $this->articlePath );
		$files = new RecursiveIteratorIterator( $files );
		$files = new RegexIterator( $files, '/\.(?:txt)/' );

		foreach ( $files as $file ) {
			$fileName = $file -> getFilename();
			$title = $this->getTitle( $fileName );
			$pathName = $file -> getPathname();
			$categoryName = $this->getCategoryName( $pathName );
			$mTime = $file -> getMTime();
			$link = $this->getArticleLink( $categoryName, $fileName );
			$description = $this->getArticleDescription( $pathName );

			$articleList[] = array(
				'title' => $title,
				'catName' => $categoryName,
				'date' => $mTime,
				'link' => $link,
				'description' => $description
			);
		}


		//Sort By Date
		usort(	$articleList, function(	$a, $b) {
    		return  $b['date'] - $a['date'];
		});

		foreach ( $articleList as $list ) {
			$result[$list['title']] = array(
				'catName' => $list['catName'],
				'date' => $this->getDate( $list['date'] ),
				'link' => $list['link'],
				'description' => $list['description']
			);
		}
		return $result;	
	}

	function getDate( $mTime ) {
		return date( "d/m/Y", $mTime );
	}

	function getArticleDescription( $path ) {
		$desc = null;
		$fh = fopen( $path ,'r');

		$i = 0;
		while ( $line = fgets( $fh ) ) {
			if ( $i != 0 )
				$desc .= $line;
			$i++;
		}
		fclose( $fh );

		$desc = $this->limitWords( $desc, 50 );
		return $desc;
	}

	function limitWords( $string, $word_limit ) {
		$words = explode( " ", $string );
		return implode( " ", array_splice( $words, 0, $word_limit ) );
	}

	function getArticleLink( $categoryName, $fileName ) {
		$fileName = str_replace( '.txt', '', $fileName );
		$fileName = urlencode( $fileName );

		$url = array(
			'homeUrl' => rtrim( HOME_URL, '/' ),
			'blog' => 'blog',
			'category' => $categoryName,
			'filename' => $fileName . FORMAT
		);
		return implode( '/', $url );
	}

	function getCategoryName( $pathName ) {
		$arr = explode( '/', $pathName );
		$indexNumber = count( $arr ) - 2;
		return $arr[$indexNumber];
	}

	function getTitle( $fileName ) {
		$find = array( '--', '-', '_', '.txt' );
		$replace = array( ' ', ' ', ' ', '' );
		$title = str_replace( $find, $replace, $fileName );
		return ucwords( $title );
	}
}