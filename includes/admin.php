<?php

/**
 * Loads backend scripts.
 */
function ecologie_admin_enqueue_scripts() {
	wp_enqueue_script( 'admin-base-js', get_template_directory_uri() . '/js/admin-script.js', 'jquery', wp_get_theme()->get( 'Version' ), true );
}

add_action( 'admin_enqueue_scripts', 'ecologie_admin_enqueue_scripts' );