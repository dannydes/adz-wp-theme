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
		'add_this_enabled' => true,
	);
	return $options;
}

/**
 * Attach new controls to the site customizer.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function ecologie_customize_register( $wp_customize ) {
	$defaults = ecologie_get_default_options();
	
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
		array( 'add_this_script_url', array(
			'type' => 'text',
			'label' => 'AddThis script URL',
			'section' => 'add_this',
			'description' => 'Enter the <b>src</b> of the <b>script</b> given by AddThis.',
		) ),
		array( 'add_this_enabled', array(
			'type' => 'checkbox',
			'label' => 'Enable AddThis sharing buttons',
			'section' => 'add_this',
		) ),
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
	
	$wp_customize->add_section( 'add_this', array(
		'title' => __( 'AddThis Social Sharing Tool' ),
		'description' => __( 'Configures the AddThis tool.' ),
		'panel' => 'ecologie',
	) );
	
	foreach ( $settings as $setting ) {
		$wp_customize->add_setting( $setting[0], array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => $defaults[$setting[0]],
		) );
		
		$wp_customize->add_control( $setting[0], $setting[1] );
	}
}

add_action( 'customize_register', 'ecologie_customize_register' );