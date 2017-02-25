<?php

/**
 * Checks whether the site is installed locally.
 *
 * @return boolean Whether URL starts with "http[s]//localhost/" or not.
 */
function is_localhost() {
	return preg_match( '/http(s)?:\/\/localhost\/.*/', get_site_url() ) === 1;
}

/**
 * Adds production mode section, setting and control.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function add_production_mode_setting( $wp_customize ) {
	$wp_customize->add_section( 'production_mode', array(
		'title' => __( 'Production Mode' ),
		'description' => __( 'Configures production mode. Only available on localhost' ),
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
		'label' => 'Enable Production Mode',
		'section' => 'production_mode',
	) );
}

/**
 * Checks whether production mode is disabled or not.
 *
 * @return boolean Whether production mode is disabled or not.
 */
function production_mode_disabled() {
	return ! get_theme_mod( 'production_mode_on', false );
}

/**
 * Enqueue production mode scripts.
 */
function enqueue_production_scripts() {
	wp_enqueue_script( 'sidebar', get_template_directory_uri() . '/js/sidebar.js', array( 'jquery' ) , $theme_version, true );
	wp_enqueue_script( 'mailchimp', get_template_directory_uri() . '/js/mailchimp.js', $base_script_deps , $theme_version, true );
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/js/contact.js', array( 'jquery' ) , $theme_version, true );
	wp_enqueue_script( 'comments', get_template_directory_uri() . '/js/comments.js', array( 'jquery' ) , $theme_version, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) , $theme_version, true );
	
	wp_localize_script( 'contact', 'ecologie', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}