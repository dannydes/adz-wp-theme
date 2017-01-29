<?php

/**
 * Returns theme options' default values.
 *
 * @return array Default values.
 */
function ecologie_get_default_options() {
	$options = array(
		'add_this_script_url' => '',
		'cta_block_text' => 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.',
		'cta_block_btn_text' => 'Join us',
		'cta_block_btn_url' => '#',
	);
	return $options;
}

/**
 * Initialises global theme options variable and create database entry.
 */
function ecologie_options_init() {
	global $ecologie_options;
	$ecologie_options = get_option( 'theme_ecologie_options' );
	if ( $ecologie_options === FALSE ) {
		$ecologie_options = ecologie_get_default_options();
	}
	update_option( 'theme_ecologie_options', $ecologie_options );
}

add_action( 'after_setup_theme', 'ecologie_options_init', 9 );

/**
 * Attach new controls to the site customizer.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function ecologie_customize_register( $wp_customize ) {
	$settings = array(
		array( 'cta_block_text', array(
			'type' => 'text',
			'label' => 'Call for Action Text',
			'section' => 'cta_block',
		) ),
		array( 'cta_block_btn_text', array(
			'type' => 'text',
			'label' => 'Call for Action Button Text',
			'section' => 'cta_block',
		) ),
		array( 'cta_block_btn_url', array(
			'type' => 'url',
			'label' => 'Call for Action Button URL',
			'section' => 'cta_block',
		) ),
		/*array( '', array(
			'type' => 'text',
			'label' => '',
			'section' => '',
		) ),*/
	);
	
	$wp_customize->add_panel( 'ecologie', array(
		'title' => __( 'Ecologie Settings' ),
		'description' => __( 'Settings related to Ecologie theme' ),
	) );
	
	$wp_customize->add_section( 'cta_block', array(
		'title' => __( 'Home Call to Action Block' ),
		'description' => __( 'Configures the appearance of the home\'s call-to-action block.' ),
		'panel' => 'ecologie',
	) );
	
	foreach ( $settings as $setting ) {
		$wp_customize->add_setting( $setting[0], array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
		) );
		
		$wp_customize->add_control( $setting[0], $setting[1] );
	}
}

add_action( 'customize_register', 'ecologie_customize_register' );