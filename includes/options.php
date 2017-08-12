<?php

/**
 * Get theme mod or the default value for specified key.
 *
 * @since 0.9
 *
 * @param string $key Theme mod key.
 * @return Theme mod or the default value for specified key.
 */
function get_theme_mod_or_default( $key ) {
	$default = array(
		'add_this_profile_id' => '',
		'cta_block_text' => 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.',
		'cta_block_btn_text' => 'Join us',
		'cta_block_btn_url' => '#',
		'add_this_enabled' => true,
		'recent_posts' => 5,
		'copyright_text_addition' => '',
		'copyright_text_on' => true,
		'header_on' => true,
		'header_image_text_on' => true,
		'header_image_text' => 'Social justice, civil rights and environmental sustainability at heart.',
		'header_image_manifesto' => '',
		'contact_sc_smtp_username' => '',
		'contact_sc_smtp_password' => '',
		'contact_sc_smtp_host' => '',
		'sidebar_on' => true,
	);
	
	return get_theme_mod( $key, $default[$key] );
}

/**
 * Attach new controls to the site customizer.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function ecologie_customize_register( $wp_customize ) {
	$defaults = $GLOBALS['ecologie_default_options'];
	
	$settings = array(
		array( 'cta_block_text', array(
			'type' => 'text',
			'label' => __( 'Call to Action Text', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_text', array(
			'type' => 'text',
			'label' => __( 'Call to Action Button Text', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_url', array(
			'type' => 'url',
			'label' => __( 'Call to Action Button URL', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'add_this_profile_id', array(
			'type' => 'text',
			'label' => __( 'AddThis Profile ID', 'ecologie' ),
			'section' => 'add_this',
			'description' => __( 'Enter the <b>Profile ID</b> given by AddThis.', 'ecologie' ),
		), 'refresh' ),
		array( 'add_this_enabled', array(
			'type' => 'checkbox',
			'label' => __( 'Enable AddThis sharing buttons', 'ecologie' ),
			'section' => 'add_this',
		), 'refresh' ),
		array( 'recent_posts', array(
			'type' => 'number',
			'label' => __( 'Number of recent posts', 'ecologie' ),
			'section' => 'blog',
		), 'postMessage' ),
		array( 'copyright_text_addition', array(
			'type' => 'text',
			'label' => __( 'Text to add to copyright notice', 'ecologie' ),
			'section' => 'footer',
		), 'postMessage' ),
		array( 'copyright_text_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable copyright notice', 'ecologie' ),
			'section' => 'footer',
		), 'refresh' ),
		array( 'header_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable header', 'ecologie' ),
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable header image text', 'ecologie' ),
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text', array(
			'type' => 'text',
			'label' => __( 'Header image text', 'ecologie' ),
			'section' => 'header',
		), 'postMessage' ),
		array( 'header_image_manifesto', array(
			'type' => 'text',
			'label' => __( 'Header image Electoral Manifesto URL', 'ecologie' ),
			'section' => 'header',
		), 'postMessage' ),
		array( 'contact_sc_conn_method', array(
			'type' => 'radio',
			'label' => __( 'Contact Email Connection Method', 'ecologie' ),
			'section' => 'contact_shortcode',
			'choices' => array(
				'smtp' => __( 'SMTP (Simple Mail Transfer Protocol)', 'ecologie' ),
				'google_auth' => __( 'Google Authentication (Gmail only)', 'ecologie' ),
			),
		), 'postMessage' ),
		array( 'contact_sc_smtp_host', array(
			'type' => 'text',
			'label' => __( 'SMTP Host', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_secure_conn_method', array(
			'type' => 'text',
			'label' => __( 'SMTP Secure Connection Method', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_port', array(
			'type' => 'text',
			'label' => __( 'SMTP Port', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_username', array(
			'type' => 'text',
			'label' => __( 'SMTP Username', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_password', array(
			'type' => 'password',
			'label' => __( 'SMTP Password', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_gmail_auth', array(
			'type' => 'hidden',
			'description' => __( '<h2>Gmail Authentication</h2><a href="https://accounts.google.com/o/oauth2/v2/auth?client_id=' . ecologie_get_google_client_id() .
				'&response_type=code&scope=openid%20email&redirect_uri=' . site_url( '', 'admin' ) . '">Authenticate with Gmail.</a>', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'sidebar_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable sidebar', 'ecologie' ),
			'section' => 'sidebar',
		), 'refresh' ),
	);
	
	$wp_customize->add_panel( 'ecologie', array(
		'title' => __( 'Ecologie Settings', 'ecologie' ),
		'description' => __( 'Settings related to Ecologie theme', 'ecologie' ),
	) );
	
	$wp_customize->add_section( 'cta_block', array(
		'title' => __( 'Home Call to Action Block', 'ecologie' ),
		'description' => __( 'Configures the appearance of the home\'s call-to-action block.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'add_this', array(
		'title' => __( 'AddThis Social Sharing Tool', 'ecologie' ),
		'description' => __( 'Configures the AddThis tool.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'blog', array(
		'title' => __( 'Blog', 'ecologie' ),
		'description' => __( 'Configures blog.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'header', array(
		'title' => __( 'Header', 'ecologie' ),
		'description' => __( 'Configures header image.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'footer', array(
		'title' => __( 'Footer', 'ecologie' ),
		'description' => __( 'Configures footer.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'contact_shortcode', array(
		'title' => __( 'Contact Shortcode', 'ecologie' ),
		'description' => __( 'Configures contact shortcode.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'sidebar', array(
		'title' => __( 'Sidebar', 'ecologie' ),
		'description' => __( 'Configures sidebar.', 'ecologie' ),
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