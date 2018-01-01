<?php

/**
 * Checks whether the site is installed locally.
 *
 * @return bool Whether URL starts with "http[s]://localhost[:port]/" or not.
 */
function is_localhost() {
	return preg_match( '/http(s)?:\/\/localhost(:[\d]+)?\/.*/', get_site_url() ) === 1;
}

/**
 * Adds production mode section, setting and control.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function add_production_mode_setting( $wp_customize ) {
	$wp_customize->add_section( 'production_mode', array(
		'title' => __( 'Production Mode', 'ecologie' ),
		'description' => __( 'Configures production mode. Only available on localhost', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_setting( 'production_mode_on', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => false,
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_control( 'production_mode_on', array(
		'type' => 'checkbox',
		'label' => __( 'Enable Production Mode', 'ecologie' ),
		'section' => 'production_mode',
	) );
}

/**
 * Checks whether production mode is disabled or not.
 *
 * @uses is_localhost()
 *
 * @return bool Whether production mode is disabled or not.
 */
function production_mode_disabled() {
	return is_localhost() && ! get_theme_mod( 'production_mode_on', false );
}

/**
 * Enqueue development mode scripts.
 */
function enqueue_development_scripts() {
	wp_enqueue_script( 'sidebar', get_template_directory_uri() . '/js/sidebar.js', array( 'jquery' ) , $theme_version, true );
	wp_enqueue_script( 'mailchimp', get_template_directory_uri() . '/js/mc-validate.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'mailchimp-widget', get_template_directory_uri() . '/js/mailchimp.js', array( 'jquery', 'mailchimp' ), $theme_version, true );
	wp_enqueue_script( 'ecologie-js-utils', get_template_directory_uri() . '/js/utils.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/js/contact.js', array( 'jquery', 'ecologie-js-utils' ) , $theme_version, true );
	wp_enqueue_script( 'cookies', get_template_directory_uri() . '/js/cookies.js', array( 'jquery', 'ecologie-js-utils' ) , $theme_version, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) , $theme_version, true );
	
	ecologie_localize_contact_script( 'contact' );
}