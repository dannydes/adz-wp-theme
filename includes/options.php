<?php

/**
 * @since 0.9
 * @global $default Default setting values.
 */
$default = array(
	'cta_block_text' => 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.',
	'cta_block_btn_text' => 'Join us',
	'cta_block_btn_url' => '#',
	'add_this_enabled' => true,
	'recent_posts' => 5,
	'copyright_text_on' => true,
	'header_on' => true,
	'header_image_text_on' => true,
	'header_image_text' => 'Social justice, civil rights and environmental sustainability at heart.',
	'header_image_manifesto_on' => true,
	'contact_sc_captcha_on' => true,
	'contact_sc_conn_method' => 'smtp',
	'contact_sc_gapi_redirect_url' => admin_url( 'customize.php?action=google_auth_grant' ),
	'sidebar_on' => true,
	'back_to_top_on' => true,
	'site_description_primary_menu_on' => true,
);

/**
 * Gets theme mod or the default value for specified key.
 *
 * @since 0.9
 *
 * @param string $key Theme mod key.
 * @return mixed Theme mod or the default value for specified key.
 */
function ecologie_get_theme_mod_or_default( $key ) {
	global $default;
	return get_theme_mod( $key, ( isset( $default[$key] ) ? $default[$key] : null ) );
}

/**
 * Attaches new controls to the site customizer.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager.
 */
function ecologie_customize_register( $wp_customize ) {
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
			'input_attrs' => array(
				'min' => 1,
			),
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
		array( 'header_image_manifesto_on', array(
			'type' => 'checkbox',
			'label' => __ ( 'Enable header image Manifesto link', 'ecologie' ),
			'description' => __( 'Show/hide Manifesto link on header image.', 'ecologie' ),
			'section' => 'header',
		), 'refresh' ),
		array( 'header_image_manifesto', array(
			'type' => 'text',
			'label' => __( 'Header image Electoral Manifesto URL', 'ecologie' ),
			'description' => __( 'URL for the Electoral Manifesto link displayed upon header image.', 'ecologie' ),
			'section' => 'header',
		), 'postMessage' ),
		array( 'contact_sc_captcha_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable captcha', 'ecologie' ),
			'description' => __( 'Enables/disables captcha for contact forms generated by the shortcode.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'refresh' ),
		array( 'contact_sc_recaptcha_site_key', array(
			'type' => 'text',
			'label' => __( 'reCAPTCHA Site Key', 'ecologie' ),
			'description' => __( 'Site Key for Google Invisible reCAPTCHA', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_recaptcha_secret_key', array(
			'type' => 'text',
			'label' => __( 'reCAPTCHA Secret Key', 'ecologie' ),
			'description' => __( 'Secret Key for Google Invisible reCAPTCHA', 'ecologie' ),
			'section' => 'contact_shortcode',
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
			'type' => 'radio',
			'label' => __( 'SMTP Secure Connection Method', 'ecologie' ),
			'description' => __( 'Secure connection method of your preference or provided by your SMTP host of choice.', 'ecologie' ),
			'section' => 'contact_shortcode',
			'choices' => array(
				'ssl' => __( 'SSL', 'ecologie' ),
				'tls' => __( 'TLS', 'ecologie' ),
			),
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
		array( 'contact_sc_gapi_clientid', array(
			'type' => 'text',
			'label' => __( 'Google API Client ID', 'ecologie' ),
			'description' => __( 'Client ID for authentication with Google.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_gapi_client_secret', array(
			'type' => 'text',
			'label' => __( 'Google API Client Secret', 'ecologie' ),
			'description' => __( 'Client Secret for authentication with Google.', 'ecologie' ),
			'section' => 'contact_shortcode',
		), 'postMessage' ),
		array( 'contact_sc_gapi_redirect_url', array(
			'type' => 'text',
			'label' => __( 'Google API Redirect URL', 'ecologie' ),
			'description' => __( 'Redirection URL for Google authentication.', 'ecologie' ),
			'section' => 'contact_shortcode',
			'input_attrs' => array(
				'readonly' => true,
			),
		), 'postMessage' ),
		array( 'sidebar_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable sidebar', 'ecologie' ),
			'description' => __( 'Enable/disable sidebar.', 'ecologie' ),
			'section' => 'general',
		), 'refresh' ),
		array( 'back_to_top_on', array(
			'type' => 'checkbox',
			'label' => __( 'Enable back to top', 'ecologie' ),
			'description' => __( 'Enable/disable back to top', 'ecologie' ),
			'section' => 'general',
		), 'refresh' ),
		array( 'site_title_primary_menu_on', array(
			'type' => 'checkbox',
			'label' => __( 'Show site title in primary menu', 'ecologie' ),
			'description' => __( 'Show/hide site title in primary menu', 'ecologie' ),
			'section' => 'general',
		), 'refresh' ),
		array( 'site_description_primary_menu_on', array(
			'type' => 'checkbox',
			'label' => __( 'Show site description in primary menu', 'ecologie' ),
			'description' => __( 'Show/hide site description in primary menu', 'ecologie' ),
			'section' => 'general',
		), 'refresh' ),
	);
	
	if ( get_theme_mod( 'contact_sc_gapi_clientid' ) && get_theme_mod( 'contact_sc_gapi_client_secret' ) ) {
		$settings[] = array( 'contact_sc_gmail_auth', array(
				'type' => 'hidden',
				'description' => __( get_theme_mod( 'contact_sc_gapi_access_token' ) ?
					'Authenticated!' : '<a href="' . ecologie_google_client()->createAuthUrl() . '">Authenticate with Gmail.</a>', 'ecologie' ),
				'section' => 'contact_shortcode',
			), 'postMessage' );
	}
	
	$wp_customize->add_panel( 'ecologie', array(
		'title' => __( 'Ecologie Settings', 'ecologie' ),
		'description' => __( 'Settings related to Ecologie theme', 'ecologie' ),
	) );
	
	$wp_customize->add_section( 'general', array(
		'title' => __( 'General', 'ecologie' ),
		'description' => __( 'This section contains settings related to general features of the theme.', 'ecologie' ),
		'panel' => 'ecologie',
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
	
	if ( is_localhost() ) {
		add_production_mode_setting( $wp_customize );
	}
	
	global $default;
	foreach ( $settings as $setting ) {
		$wp_customize->add_setting( $setting[0], array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => ( isset( $default[$setting[0]] ) ? $default[$setting[0]] : null ),
			'transport' => $setting[2],
		) );
		
		$wp_customize->add_control( $setting[0], $setting[1] );
	}
	
	$wp_customize->add_setting( 'main_color', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	) );
	
	/*$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'main_color',
		array(
			'label' => __( 'Main Colour', 'ecologie' ),
			'section' => 'general',
			'settings' => 'main_color',
		) ) ); */
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

/**
 * Customises color pickers.
 *
 * @since 0.9.1
 */
function ecologie_color_picker() {
	wp_enqueue_script( 'theme-customize',
		get_template_directory_uri() . '/admin-static/js/color-picker.js',
		array( 'jquery', 'iris' ),
		wp_get_theme()->get( 'Version' ),
		true );
}

add_action( 'customize_controls_print_footer_scripts', 'ecologie_color_picker' );