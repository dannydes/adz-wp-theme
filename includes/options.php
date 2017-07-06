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
		'recent_posts' => 5,
		'copyright_text_addition' => '',
		'header_on' => true,
		'header_image_text_on' => true,
		'header_image_text' => 'Social justice, civil rights and environmental sustainability at heart.',
		'header_image_manifesto' => '',
		'contact_sc_smtp_username' => '',
		'contact_sc_smtp_password' => '',
		'contact_sc_smtp_host' => '',
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
			'label' => 'Call to Action Text',
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_text', array(
			'type' => 'text',
			'label' => 'Call to Action Button Text',
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_url', array(
			'type' => 'url',
			'label' => 'Call to Action Button URL',
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'add_this_script_url', array(
			'type' => 'text',
			'label' => 'AddThis script URL',
			'section' => 'add_this',
			'description' => 'Enter the <b>src</b> of the <b>script</b> given by AddThis.',
		), 'refresh' ),
		array( 'add_this_enabled', array(
			'type' => 'checkbox',
			'label' => 'Enable AddThis sharing buttons',
			'section' => 'add_this',
		), 'refresh' ),
		array( 'recent_posts', array(
			'type' => 'number',
			'label' => 'Number of recent posts',
			'section' => 'blog',
		), 'postMessage' ),
		array( 'copyright_text_addition', array(
			'type' => 'text',
			'label' => 'Text to add to copyright notice',
			'section' => 'footer',
		), 'postMessage' ),
		array( 'header_on', array(
			'type' => 'checkbox',
			'label' => 'Enable header',
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text_on', array(
			'type' => 'checkbox',
			'label' => 'Enable header image text',
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text', array(
			'type' => 'text',
			'label' => 'Header image text',
			'section' => 'header',
		), 'postMessage' ),
		array( 'header_image_manifesto', array(
			'type' => 'text',
			'label' => 'Header image Electoral Manifesto URL',
			'section' => 'header',
		), 'postMessage' ),
		array( 'contact_sc_smtp_host', array(
			'type' => 'text',
			'label' => 'SMTP Host',
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_secure_conn_method', array(
			'type' => 'text',
			'label' => 'SMTP Secure Connection Method',
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_port', array(
			'type' => 'text',
			'label' => 'SMTP Port',
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_username', array(
			'type' => 'text',
			'label' => 'SMTP Username',
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_password', array(
			'type' => 'password',
			'label' => 'SMTP Password',
			'section' => 'contact_shortcode',
		), 'postMessage' ),
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
	
	$wp_customize->add_section( 'blog', array(
		'title' => __( 'Blog' ),
		'description' => __( 'Configures blog.' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'header', array(
		'title' => __( 'Header' ),
		'description' => __( 'Configures header image.' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'footer', array(
		'title' => __( 'Footer' ),
		'description' => __( 'Configures footer.' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'contact_shortcode', array(
		'title' => __( 'Contact Shortcode' ),
		'description' => __( 'Configures contact shortcode.' ),
		'panel' => 'ecologie',
	) );
	
	if ( is_localhost() ) {
		add_production_mode_setting( $wp_customize );
	}
	
	foreach ( $settings as $setting ) {
		$wp_customize->add_setting( $setting[0], array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => $defaults[$setting[0]],
			'transport' => $setting[2],
		) );
		
		$wp_customize->add_control( $setting[0], $setting[1] );
	}
}

add_action( 'customize_register', 'ecologie_customize_register' );

/**
 * Enqueue scripts to be used by customizer live preview.
 */
function ecologie_customizer_live_preview() {
	wp_enqueue_script( 'theme-customize',
		get_template_directory_uri() . '/admin-static/js/theme-customize.js',
		array( 'jquery', 'customize-preview' ),
		wp_get_theme()->get( 'Version' ),
		true );

	wp_localize_script( 'theme-customize', 'ecologie', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}

add_action( 'customize_preview_init', 'ecologie_customizer_live_preview' );

/**
 * Responds to AJAX request to update recent posts.
 */
function ecologie_ajax_recent_posts() {
	require 'blog/recent-posts.php';
	wp_die();
}

add_action( 'wp_ajax_recent_posts', 'ecologie_ajax_recent_posts' );