<?php
//Shop Redirect to merchant
Map::get( '/', 'home#index' );

Map::get( '/about', 'staticpage#about' );
Map::get( '/contact', 'staticpage#contact' );
Map::get( '/privacy-policy', 'staticpage#privacy' );

Map::get( '/categories/(.*)', 'categories#categories' );
Map::get( '/brands/(.*)', 'categories#brands' );

Map::get( '/category/(.*)', 'category#category' );
Map::get( '/brand/(.*)', 'category#brand' );

Map::get( '/goto/(.*)', 'goto#index' );
Map::get( '/error', 'error#index' );

Map::get( '/(.*)', 'product#index' );
