<?php
define( 'BASE_PATH', dirname( dirname( realpath( __FILE__ ) ) ) . '/');
define( 'APP_PATH', BASE_PATH . 'app/' );

/*
 * GET CONFIG VARIABLES
 * ----------------------------------------------------------------------------
*/
$confPath = BASE_PATH . 'config/config.php';
if ( ! file_exists( $confPath ) )
	die( "config file does not exitst" );
include $confPath;
extract( $cfg );

$scArr = explode( '#', $statcounter );
$sc_project = $scArr[0];
$sc_security = $scArr[1];

/*
 * ตัวแปรที่ใช้ในการ Create Page
 * ----------------------------------------------------------------------------
*/
define( 'CONTENT_PATH', BASE_PATH . 'contents/' );
define( 'HOME_URL', $domain . '/' );
define( 'HOME_LINK', HOME_URL );
define( 'LOGO_TEXT', $site_name );
define( 'SITE_TYPE', $site_type );

//Network
define( 'NETWORK', $network );
define( 'API_KEY', $api_key );
define( 'SID', $prefix_sid );

//Theme
define( 'THEME_NAME', $theme_name );
//define( 'THEME_URL', HOME_URL . $appDir . '/app/views/' . THEME_NAME . '/' );
define( 'THEME_PATH', BASE_PATH . 'app/views/' . THEME_NAME . '/' );
define( 'AUTHOR', $site_author );
define( 'SITE_NAME', $site_name );
define( 'SITE_DESC', $site_desc );

// define( 'CSS_PATH', THEME_URL . 'assets/css/' );
// define( 'JS_PATH', THEME_URL . 'assets/js/' );
// define( 'IMG_PATH', THEME_URL . 'assets/img/' );
// define( 'BLANK_IMG', IMG_PATH . 'blank.png' );

define( 'CSS_PATH', HOME_URL . 'assets/css/' );
define( 'JS_PATH', HOME_URL . 'assets/js/' );
define( 'IMG_PATH', HOME_URL . 'assets/img/' );
define( 'BLANK_IMG', HOME_URL . 'assets/img/ajax-loader' );
// 
// define( 'CSS_PATH', HOME_URL . 'css/' );
// define( 'JS_PATH', HOME_URL . 'js/' );
// define( 'IMG_PATH', HOME_URL . 'img/' );
// define( 'BLANK_IMG', HOME_URL . 'img/ajax-loader' );

//สำหรับจัดรูปแบบให้ URL
define( 'PROD_ROUTE', $prod_route );
define( 'FORMAT', $url_format );

//Stat Counter
define( 'SC_PROJECT', $sc_project );
define( 'SC_SECURITY', $sc_security );

//TextSpinner
define( 'TEXTSPIN_PATH', BASE_PATH . 'files/textspinner/market-01/' );

