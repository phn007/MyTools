<?php
class ArticleContentModel extends AppComponent {
	function getContent( $params ) {
		$catName = $params[0];
		$fileName = $this->getFilename( $params[1] );
		$content = $this->getArticleContent( $catName, $fileName );
		return $content;
	}

	function getArticleContent( $catName, $fileName ) {
		$path = BASE_PATH . 'articles/' . $catName;
		$files = new FilesystemIterator( $path, FilesystemIterator::UNIX_PATHS );
		
		foreach ( $files as $file ) {
			if ( $fileName == $file->getFilename() ) {
				$textFile = $file->openFile();
				$content = null;
				$i = 0;
				foreach ( $textFile as $line ) {
					if ( $i == 0 )
						$title = $line;
					else 
						$content .= '<p>' . $line . '</p>';
					$i++;
				}
				$date = date( "d/m/Y", $file->getMTime() );
			}
		}

		return array(
			'title' => $title,
			'content' => $content,
			'catName' => $catName,
			'date' => $date
		);
	}

	function getFilename( $fileName ) {
		$fileName = str_replace( FORMAT,'.txt', $fileName );
		$fileName = urldecode( $fileName );
		return $fileName;
	}
}