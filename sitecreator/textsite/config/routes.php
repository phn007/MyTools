<?php
//Shop Redirect to merchant
Map::get( '/', 'home#index' );

Map::get( '/about-us' . FORMAT, 'staticpage#about' );
Map::get( '/contact-us' . FORMAT, 'staticpage#contact' );
Map::get( '/privacy-policy' . FORMAT, 'staticpage#privacy' );

Map::get( '/brand-index/(.*)', 'brandIndex#index' );
Map::get( '/cat-by-brand/(.*)', 'brandIndex#catByBrand' );
Map::get( '/product-by-cat/(.*)', 'brandIndex#productByCategory' );


Map::get( '/shop/categories/(.*)' . FORMAT, 'categories#categories' );
Map::get( '/shop/brands/(.*)' . FORMAT, 'categories#brands' );

Map::get( '/shop', 'shop#index' );
Map::get( '/shop/category/(.*)' . FORMAT, 'category#category' );
Map::get( '/shop/brand/(.*)' . FORMAT, 'category#brand' );
Map::get( '/shop/(.*)', 'product#index' );

Map::get( '/blog/page/(.*)', 'blog#index' );
Map::get( '/blog/category/(.*)', 'blog#category' );
Map::get( '/blog/(.*)', 'blog#article' );

Map::get( '/search/(.*)', 'search#index' );
Map::get( '/goto/(.*)', 'goto#index' );
Map::get( '/error', 'error#index' );
Map::get( '/(.*)', 'product#index' );
