<?php

/**
 * Tells WordPress to enable certain features.
 */
function ecologie_setup() {
	add_theme_support( 'custom-header' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height' => 30,
		'width' => 30,
		'flex-height' => false,
		'flex-width' => false,
	) );
	add_theme_support( 'custom-header', array(
		'height' => 300,
	) );
}

add_action( 'after_setup_theme', 'ecologie_setup' );

/**
 * Enqueues the theme's scripts and styles.
 */
function ecologie_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );
	
	$base_script_deps = array( 'jquery' );
	
	wp_enqueue_style( 'base-css', get_template_directory_uri() . '/style.css', '', $theme_version );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '', '4.7' );
	wp_enqueue_script( 'jquery' );
	
	if ( is_active_widget( false, false, 'ecologie_mailchimp_subscribe_widget' ) ) {
		wp_enqueue_script( 'mailchimp', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', '', '', true );
		$base_script_deps[] = 'mailchimp';
	}
	
	if ( is_localhost() && production_mode_disabled() ) {
		enqueue_production_scripts();
	} else {
		wp_enqueue_script( 'base-js', get_template_directory_uri() . '/script.js', $base_script_deps , $theme_version, true );
	}

	if ( get_theme_mod( 'add_this_enabled', ecologie_get_default_options()['add_this_enabled'] ) && get_post_type() === 'post' ) {
		wp_enqueue_script( 'addthis', get_theme_mod( 'add_this_script_url' ), '', '', true );
	}
}

add_action( 'wp_enqueue_scripts', 'ecologie_enqueue_scripts' );

//Hack from Eazy Enable Blogroll plugin to reenable links manager
if( get_bloginfo( 'version' ) >= 3.5 ) {
  add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}