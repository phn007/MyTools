<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( isset( $seoTags ) ) echo $seoTags ?>
	<link rel="stylesheet" href="<?php echo CSS_PATH?>style.css">
</head>
<body>
  	<div class="main-content">
		<header>
			Header Content
		</header>

		<div class="main">[%LAYOUT_CONTENT%]</div>
	</div>

	<footer class="footer">
		Footer
	</footer>
	<script src="<?php echo JS_PATH?>plugins.js"></script>
  <script src="<?php echo JS_PATH?>main.js"></script>
</body>
</html>



