<?php
trait Code {	
	function getAllExceptViews() {
		$source = $this->getSourcePath() . 'textsite';
		$destination = $this->getDestinationPath() . $this->config['app_dir'] . '/';

		$excludeFiles = array( 
			$source . '/app/views' , 
			$source . '/r.php',
			$source . '/index.php',
		);
		$this->cloneCom->runClone( $source, $destination, $excludeFiles, 'excludeMode' );
	}

	function getSiteIndexFile() {
		// $source = $this->getSourcePath() . 'textsite';
		// $destination = $this->getDestinationPath();
		// $includeFiles = array( $source . '/index.php' );
		// $this->cloneCom->runClone( $source, $destination, $includeFiles, 'includeMode' );

		$source = $this->getSourcePath() . 'textsite/index.php';
		$content = file_get_contents( $source );
		$content = str_replace( '<?php', '', $content );

		$text = '<?php' . PHP_EOL;
		$text .= "\$appDir = '" . $this->config['app_dir'] . "';" . PHP_EOL;
		$text .= $content;
	
		$destination = $this->getDestinationPath() . 'index.php';
		file_put_contents( $destination, $text );

	}	

	function getViews() {
		$source = $this->getSourcePath() . 'textsite/app/views/' . $this->config['theme_name'];
		if ( !file_exists( $source ) ) die( "\nTheme directory not found!!!\n" );

		$destination = $this->getDestinationPath() . $this->config['app_dir'] . '/' . 'app/views/' . $this->config['theme_name'];
		$excludeFiles = array( $source . '/assets' );
		$this->cloneCom->runClone( $source, $destination, $excludeFiles, 'excludeMode' );
	}

	function getAssets() {
		$source = $this->getSourcePath() . 'textsite/app/views/' . $this->config['theme_name'] . '/assets';
		if ( !file_exists( $source ) ) die( "\nTheme directory not found!!!\n" );

		$destination = $this->getDestinationPath() . 'assets';
		//$destination = $this->getDestinationPath();
		$excludeFiles = array( 
			$source . '/less',
			$source . '/sass',
			$source . '/scss',
			$source . '/.sass-cache',
			//$source . '/index.html',
			$source . '/config.rb'
		);
		$this->cloneCom->runClone( $source, $destination, $excludeFiles, 'excludeMode' );
	}

	function getRouteFileForDevelopment() {
		$source = $this->getSourcePath() . 'textsite';
		$destination = $this->getDestinationPath();
		$includeFiles = array( $source . '/r.php' );
		$this->cloneCom->runClone( $source, $destination, $includeFiles, 'includeMode' );
	}

	function getSourcePath() {
		return WT_BASE_PATH . 'sitecreator/';
	}
	
	function getDestinationPath() {
		return TEXTSITE_PATH . $this->config['project'] . '/' . $this->config['site_dir'] . '/';
	}	
}
