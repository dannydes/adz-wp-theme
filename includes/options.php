<?php

/**
 * @global $default Default setting values.
 */
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

/**
 * Gets theme mod or the default value for specified key.
 *
 * @since 0.9
 *
 * @param string $key Theme mod key.
 * @return Theme mod or the default value for specified key.
 */
function ecologie_get_theme_mod_or_default( $key ) {
	global $default;
	return get_theme_mod( $key, $default[$key] );
}

/**
 * Attaches new controls to the site customizer.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function ecologie_customize_register( $wp_customize ) {
	$defaults = $GLOBALS['ecologie_default_options'];
	
	$settings = array(
		array( 'cta_block_text', array(
			'type' => 'text',
			'label' => __( 'Call to Action Text', 'ecologie' ),
			'description' => __( 'Paragraph to display in the call-to-action.', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_text', array(
			'type' => 'text',
			'label' => __( 'Call to Action Button Text', 'ecologie' ),
			'description' => __( 'Call-to-action button caption.', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'cta_block_btn_url', array(
			'type' => 'url',
			'label' => __( 'Call to Action Button URL', 'ecologie' ),
			'description' => __( 'Call-to-action button link URL.', 'ecologie' ),
			'section' => 'cta_block',
		), 'postMessage' ),
		array( 'add_this_profile_id', array(
			'type' => 'text',
			'label' => __( 'AddThis Profile ID', 'ecologie' ),
			'description' => __( 'Profile ID of AddThis account to integrate.', 'ecologie' ),
			'section' => 'add_this',
		), 'refresh' ),
		array( 'add_this_enabled', array(
			'type' => 'checkbox',
			'label' => __( 'Enable AddThis sharing buttons', 'ecologie' ),
			'description' => __( 'Enable/disable AddThis sharing.', 'ecologie' ),
			'section' => 'add_this',
		), 'refresh' ),
		array( 'recent_posts', array(
			'type' => 'number',
			'label' => __( 'Number of recent posts', 'ecologie' ),
			'description' => __( 'Number of recent posts to display on front page.', 'ecologie' ),
			'section' => 'blog',
		), 'postMessage' ),
		array( 'copyright_text_addition', array(
			'type' => 'text',
			'label' => __( 'Text to add to copyright notice', 'ecologie' ),
			'description' => __( 'Text to be displayed near the copyright notice in the footer.', 'ecologie' ),
			'section' => 'footer',
		), 'postMessage' ),
		array( 'copyright_text_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable copyright notice', 'ecologie' ),
			'description' => __( 'Show/hide copyright notice.', 'ecologie' ),
			'section' => 'footer',
		), 'refresh' ),
		array( 'header_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable header', 'ecologie' ),
			'description' => __( 'Enable/disable header.', 'ecologie' ),
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable header image text', 'ecologie' ),
			'description' => __( 'Show/hide text to display on header image.', 'ecologie' ),
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_text', array(
			'type' => 'text',
			'label' => __( 'Header image text', 'ecologie' ),
			'description' => __( 'Paragraph to be displayed upon header image.', 'ecologie' ),
			'section' => 'header',
		), 'postMessage' ),
		array( 'header_image_manifesto', array(
			'type' => 'text',
			'label' => __( 'Header image Electoral Manifesto URL', 'ecologie' ),
			'description' => __( 'URL for the Electoral Manifesto link displayed upon header image.', 'ecologie' ),
			'section' => 'header',
		), 'postMessage' ),
		array( 'contact_sc_conn_method', array(
			'type' => 'radio',
			'label' => __( 'Contact Email Connection Method', 'ecologie' ),
			'description' => __( 'Whether you would like emails to be send through SMTP or the Gmail API. In case you\'ll be attaching a Gmail account, the latter is recommended.', 'ecologie' ),
			'section' => 'contact_shortcode',
			'choices' => array(
				'smtp' => __( 'SMTP (Simple Mail Transfer Protocol)', 'ecologie' ),
				'google_auth' => __( 'Google Authentication (Gmail only)', 'ecologie' ),
			),
		), 'postMessage' ),
		array( 'contact_sc_smtp_host', array(
			'type' => 'text',
			'label' => __( 'SMTP Host', 'ecologie' ),
			'description' => __( 'Internet address of your SMTP host of choice.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_secure_conn_method', array(
			'type' => 'text',
			'label' => __( 'SMTP Secure Connection Method', 'ecologie' ),
			'description' => __( 'Secure connection method of your preference or provided by your SMTP host of choice.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_port', array(
			'type' => 'text',
			'label' => __( 'SMTP Port', 'ecologie' ),
			'description' => __( 'Port accessible at your SMTP host of choice.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_username', array(
			'type' => 'text',
			'label' => __( 'SMTP Username', 'ecologie' ),
			'description' => __( 'SMTP username for your organisation\'s email account.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_smtp_password', array(
			'type' => 'password',
			'label' => __( 'SMTP Password', 'ecologie' ),
			'description' => __( 'SMTP password for your organisation\'s email account.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_gmail_auth', array(
			'type' => 'hidden',
			'description' => __( '<h2>Gmail Authentication</h2><a href="https://accounts.google.com/o/oauth2/v2/auth?client_id=' . ecologie_get_google_client_id() .
				'&response_type=code&scope=openid%20email&redirect_uri=' . admin_url( 'customize.php' ) . '">Authenticate with Gmail.</a>', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'sidebar_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable sidebar', 'ecologie' ),
			'description' => __( 'Enable/disable sidebar.', 'ecologie' ),
			'section' => 'sidebar',
		), 'refresh' ),
	);
	
	$wp_customize->add_panel( 'ecologie', array(
		'title' => __( 'Ecologie Settings', 'ecologie' ),
		'description' => __( 'Settings related to Ecologie theme', 'ecologie' ),
	) );
	
	$wp_customize->add_section( 'cta_block', array(
		'title' => __( 'Home Call to Action Block', 'ecologie' ),
		'description' => __( 'This section contains settings related to the call-to-action in the front page.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'add_this', array(
		'title' => __( 'AddThis Social Sharing Tool', 'ecologie' ),
		'description' => __( 'This section contains settings related to AddThis social sharing in blog posts.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'blog', array(
		'title' => __( 'Blog', 'ecologie' ),
		'description' => __( 'This section contains settings related to the blog.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'header', array(
		'title' => __( 'Header', 'ecologie' ),
		'description' => __( 'This section contains settings related to the header.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'footer', array(
		'title' => __( 'Footer', 'ecologie' ),
		'description' => __( 'This section contains settings related to the footer.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'contact_shortcode', array(
		'title' => __( 'Contact Shortcode', 'ecologie' ),
		'description' => __( 'This section contains settings related to the Contact shortcode.', 'ecologie' ),
		'panel' => 'ecologie',
	) );
	
	$wp_customize->add_section( 'sidebar', array(
		'title' => __( 'Sidebar', 'ecologie' ),
		'description' => __( 'This section contains settings related to the sidebar.', 'ecologie' ),
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
 * Enqueues scripts to be used by customizer live preview.
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