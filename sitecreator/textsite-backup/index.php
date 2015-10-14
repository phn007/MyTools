<?php
ini_set('display_errors', 1 );
//error_reporting(~0);

date_default_timezone_set( "Asia/Bangkok" );
$root = dirname( realpath( __FILE__ ) ) . '/';


include $root . 'libs/initvars.php';
include $root . 'config/define-site-config.php';
include APP_PATH . 'traits/link_trait.php';
include $root . 'libs/core.php';
