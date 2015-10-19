<?php
function createHtaccess( $path) {
	//Create Password Protected Directory
	$str = 'AuthUserFile ' . $path. '.htpasswd' . PHP_EOL;
	$str .= 'AuthType Basic' . PHP_EOL;
	$str .= 'AuthName "' . 'My Files' . '"' . PHP_EOL;
	$str .= 'Require valid-user';

	file_put_contents( $path . '.htaccess', $str );
}

function createHtpasswd( $path ) {
	$str = 'phan:$apr1$8ezkoTBe$4CsYB6agSceSJVdWdAGGk/';
	$str = 'nuyak:$apr1$jb2.bAoE$4YatDot/5QW6P/jN1a3lh1';
	file_put_contents( $path . '.htpasswd', $str );
}
