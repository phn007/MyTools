<?php
echo "Submmit Google Sitemap";
echo "<br>";
	
$sitemapUrl = HOME_URL . 'sitemap_index.xml';
	
echo $url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=" . urlencode( $sitemapUrl );
$returnCode = myCurl( $url );
echo "<p>Google Sitemaps has been pinged (return code: $returnCode).</p>";

function myCurl( $url ) {
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_exec($ch);

	$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	curl_close( $ch );
	
	return $httpCode;
}