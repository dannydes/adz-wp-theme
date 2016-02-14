<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/noscript.css"></noscript>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<title><?php echo get_bloginfo(); if ( wp_title( '', FALSE ) !== '' ): ?> -<?php wp_title( '' ); endif; ?></title>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo(); ?></a>
				</div>
				<noscript>
					<div>Your JavaScript is disabled - this might hurt your experience. Please follow these <a href="http://www.enable-javascript.com/" target="_blank">steps</a>.</div>
				</noscript> 
				<div class="social-buttons"><?php
					$menu_items = wp_get_nav_menu_items( 'social');//$menu->term_id );
							
							foreach ( (array) $menu_items as $key => $menu_item ) {
								?><a href="<?php echo $menu_item->url; ?>" target="_blank" title="<?php echo $menu_item->title; ?>"><?php echo adz_social_icon( $menu_item->url ); ?></a><?php
							}
					?>
				</div>
				<div class="collapse navbar-collapse" id="main-menu">
					<ul class="nav navbar-nav navbar-right"><?php
						$locations = get_nav_menu_locations();
						//if ( $locations = get_nav_menu_locations() && isset( $locations[ 'custom_menu_slug' ] ) ) {
							$menu = wp_get_nav_menu_object( $locations[ 'custom_menu_slug' ] );
							$menu_items = wp_get_nav_menu_items( 'primary');//$menu->term_id );
							
							foreach ( (array) $menu_items as $key => $menu_item ) {
								?><li<?php adz_active_menu_item( $menu_item->title ); ?>><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li><?php
							}
						//}
						
						?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="page-header">
				<h1><?php wp_title( '' ); ?></h1>
			</div>