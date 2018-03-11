<?php

/**
 * Tells WordPress to enable certain features.
 */
function ecologie_setup() {
	add_theme_support( 'custom-header' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		//'comment-form', //HTML5 support for comment form outputs novalidate, disabling HTML5 validation.
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
		'height' => 1200,
		'width' => 2000,
		'flex-height' => true,
		'flex-width' => true,
		'default-image' => get_template_directory_uri() . '/img/cliff-default-header.jpg',
	) );
}

add_action( 'after_setup_theme', 'ecologie_setup' );

/**
 * Enqueues the theme's scripts and styles.
 */
function ecologie_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );
	
	wp_enqueue_style( 'base-css', get_template_directory_uri() . '/style.css', '', $theme_version );
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js', '', '5.0.8' );
	
	if ( ecologie_get_theme_mod_or_default( 'contact_sc_captcha_on' ) && ecologie_page_has_contact_shortcode() ) {
		wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', '', '', true );
	}
	
	if ( production_mode_disabled() ) {
		enqueue_development_scripts();
	} else {
		wp_enqueue_script( 'base-js', get_template_directory_uri() . '/script.js', array( 'jquery' ), $theme_version, true );
		
		ecologie_localize_contact_script( 'base-js' );
	}

	if ( ecologie_get_theme_mod_or_default( 'add_this_enabled' ) && get_post_type() === 'post' ) {
		$add_this_profile_id = ecologie_get_theme_mod_or_default( 'add_this_profile_id' );
		wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=' . $add_this_profile_id, '', '', true );
	}
}

add_action( 'wp_enqueue_scripts', 'ecologie_enqueue_scripts' );

//Hack from Eazy Enable Blogroll plugin to reenable links manager
if( get_bloginfo( 'version' ) >= 3.5 ) {
	add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

/**
 * Gets up to the first 40 characters of the site title.
 *
 * @since 0.9.1
 *
 * @return string Shortened site title.
 */
function ecologie_shortened_site_title() {
	return substr( get_bloginfo(), 0, 40 );
}

/**
 * Gets up to the first 120 characters of the site description.
 *
 * @since 0.9.1
 *
 * @return string Shortened site description.
 */
function ecologie_shortened_site_description() {
	return substr( get_bloginfo( 'description' ), 0, 120 );
}

/**
 * Darkens a hexadecimal-base color by a given percentage. Adapted from https://gist.github.com/stephenharris/5532899#file-color_luminance-php
 *
 * @since 0.9.1
 *
 * @param string $hex Hexadecimal representation for color.
 * @param float $percent Percentage by which to darken color.
 * @return string Hexadecimal representation for the resulting color.
 */
function ecologie_darken_color( $hex, $percent ) {
	// validate hex string
	
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	
	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	
	// convert to decimal and change luminosity
	for ( $i = 0; $i < 3; $i++ ) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec - $dec * $percent ), 255 ); 
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}		
	
	return $new_hex;
}