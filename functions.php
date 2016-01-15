<?php

function adz_setup() {
	register_nav_menus(array(
		'primary' => __( 'Primary Menu', 'adz' ),
		'social' => __( 'Social Links Menu', 'adz' ),
	));
}

function adz_social_icon( $url ) {
	if ( strpos( $url, 'facebook.com' ) !== FALSE ) {
		?><i class="fa fa-facebook"></i><?php
	} else if ( strpos( $url, 'twitter.com' ) !== FALSE ) {
		?><i class="fa fa-twitter"></i><?php
	} else if ( strpos( $url, 'instagram.com' ) !== FALSE ) {
		?><i class="fa fa-instagram"></i><?php
	}
}

function adz_active_menu_item( $menu_item_name ) {
	if ( substr( wp_title( '', FALSE ), 2 ) === $menu_item_name || ( $menu_item_name === 'Home' && wp_title( '', FALSE ) === '' ) ): ?> class="active"<?php endif;
}