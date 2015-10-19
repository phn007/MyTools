<?php
ini_set('display_errors', 1 );
//error_reporting(~0);

date_default_timezone_set( "Asia/Bangkok" );
$root = dirname( realpath( __FILE__ ) ) . '/';
$appPath = $root . $appDir . '/';

$protectFilePath = $appPath . '.htaccess';
if ( !file_exists( $protectFilePath )) {
	include $appPath . 'protectFile.php';
	createHtaccess( $appPath);
	createHtpasswd( $appPath );
}


include $appPath . 'libs/initvars.php';
if ( isset( $_GET['ping'] ) ) {
	include $appPath . 'ping.php';
}

include THEME_PATH . '_config/define-site-config.php';
include THEME_PATH . '_config/link_trait.php';
include $appPath . 'libs/core.php';
