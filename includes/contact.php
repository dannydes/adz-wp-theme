<?php

/**
 * Translates the [contact-us] shortcode into HTML.
 *
 * @uses ecologie_generate_arithmetic_captcha()
 *
 * @param array $atts Shortcode attributes.
 * @return string Shortcode HTML output.
 */
function contact_us_shortcode( $atts ) {
	$arithmetic_captcha = ecologie_generate_arithmetic_captcha();
	
	return ( empty( $atts['at'] ) ? '<p>Specify "at" attribute.</p>' : '' ) .
	'<form id="contact-us" action="#" method="post">
		<strong><span class="required label label-default">*</span> Asterisks denote required field.</strong>
		<div class="form-group">
			<label for="contact-name">Your name <span class="required label label-default">*</span></label>
			<input type="text" class="form-control" id="contact-name" name="name" placeholder="Your name" required aria-required="true">
		</div>
		<div class="form-group">
			<label for="contact-email">Your email <span class="required label label-default">*</span></label>
			<input type="email" class="form-control" id="contact-email" name="email" placeholder="Your email" required aria-required="true">
		</div>
		<div class="form=group">
			<label for="contact-subject">Your subject</label>
			<input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Your subject">
		</div>
		<div class="form-group">
			<label for="contact-message">Your message <span class="required label label-default">*</span></label>
			<textarea class="form-control" id="contact-message" name="message" placeholder="Your message" required aria-required="true"></textarea>
		</div>
		<div class="checkbox">
			<label for="contact-copy"><input type="checkbox" id="contact-copy" name="forward-copy" value="on"> Send me a copy</label>
		</div>
		<div class="form-inline">
			<label for="contact-arithmetic-captcha">' . $arithmetic_captcha . ' = <span class="required label label-default">*</span></label>
			<input type="text" class="form-control" id="contact-arithmetic-captcha" name="captcha-answer" placeholder="Your answer" required aria-required="true"></textarea>
		</div>
		<input type="hidden" id="contact-hidden-arithmetic-captcha" name="hidden-arithmetic-captcha" value="' . $arithmetic_captcha . '">
		<input type="hidden" id="contact-at" name="at" value="' . ( ! empty( $atts['at'] ) ? $atts['at'] : '' ) . '">
		<button type="submit" class="btn btn-default">Send message <i id="contact-sending-message" class="fa"></i></button>
	</form>';
}

add_shortcode( 'contact-us', 'contact_us_shortcode' );

/**
 * Handles AJAX request coming from contact form submission.
 */
function ecologie_ajax_contact_us() {
	if ( empty( $_POST['name'] ) || empty( $_POST['email'] ) || empty( $_POST['message'] ) || empty( $_POST['at'] ) ) {
		wp_die( __( 'Name, email and message may not be left empty.', 'ecologie' ) );
	}
	
	if ( ! ecologie_validate_arithmetic_captcha_answer() ) {
		wp_die( __( 'Incorrect answer to arithmetic CAPTCHA.', 'ecologie' ) );
	}
	
	if ( ! is_email( $_POST['email'] ) || ! is_email( $_POST['at'] ) ) {
		wp_die( __( 'The email you entered looks invalid. Please check its format and try again.', 'ecologie' ) );
	}
	
	$from = 'From: ' . $_POST['name'] . ' <' . $_POST['email'] . '>';
	
	$headers = array(
		$from,
	);
	
	if ( $_POST['forward-copy'] === 'on' ) {
		$headers[] = 'Cc: ' . $_POST['name'] . ' <' . $_POST['email'] . '>';
	}
	
	$message = $from . "\n\n" . $_POST['message'];

	$success = wp_mail( $_POST['at'], $_POST['subject'], $message, $headers );
	
	if ( $success ) {
		wp_die( 1 );
	}
	
	wp_die( __( 'Email failed!', 'ecologie' ) );
}

add_action( 'wp_ajax_nopriv_contact_us', 'ecologie_ajax_contact_us' );
add_action( 'wp_ajax_contact_us', 'ecologie_ajax_contact_us' );

/**
 * Sets up PHPMailer for the wp_mail() function to work properly.
 *
 * @param object $phpmailer PHPMailer instance.
 */
function ecologie_setup_phpmailer( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host = ecologie_get_theme_mod_or_default( 'contact_sc_smtp_host' );
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = ecologie_get_theme_mod_or_default( 'contact_sc_smtp_secure_conn_method' );
	$phpmailer->Port = ecologie_get_theme_mod_or_default( 'contact_sc_smtp_port' );
	$phpmailer->Username = ecologie_get_theme_mod_or_default( 'contact_sc_smtp_username' );
	$phpmailer->Password = ecologie_get_theme_mod_or_default( 'contact_sc_smtp_password' );
	
	if ( production_mode_disabled() ) {
		$phpmailer->SMTPDebug = 2;
	}
}

add_action( 'phpmailer_init', 'ecologie_setup_phpmailer' );

/**
 * Localises the contact script to make it easier to integrate AJAX calls with WP.
 *
 * @param string $script Script handle.
 */
function ecologie_localize_contact_script( $script ) {
	wp_localize_script( $script, 'ecologie', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	) );
}

/**
 * Adds [contact-us] button to TinyMCE editor.
 *
 * @since 0.9
 *
 * @params array $buttons Buttons belonging to the TinyMCE editor.
 * @return array Buttons to register to the TinyMCE editor.
 */
function ecologie_register_contact_us_tinymce_button( $buttons ) {
	array_push( $buttons, 'contact_us' );
	return $buttons;
}

/**
 * Loads the contact-us TinyMCE plugin.
 *
 * @since 0.9
 *
 * @params array $plugin_array List of TinyMCE plugins.
 * @return array Plugins to register to the TinyMCE editor.
 */
function ecologie_register_contact_us_tinymce_js( $plugin_array ) {
	$plugin_array['contact_us'] = get_template_directory_uri() . '/admin-static/js/tinymce-plugins/contact-us/contact-us.js';
	return $plugin_array;
}

/**
 * Prepares for the registration the contact-us TinyMCE plugin.
 *
 * @since 0.9
 *
 */
function ecologie_register_contact_us_tinymce_plugin() {
	if ( ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) ||
			get_user_option( 'rich_editing' ) !== 'true' ) {
		return;
	}
	
	add_filter( 'mce_buttons', 'ecologie_register_contact_us_tinymce_button' );
	add_filter( 'mce_external_plugins', 'ecologie_register_contact_us_tinymce_js' );
}

if ( is_admin() ) {
	add_action( 'init', 'ecologie_register_contact_us_tinymce_plugin' );
}

/**
 * Generates a random arithmetic CAPTCHA.
 *
 * @since 0.9
 *
 * @return Arithmetic CAPTCHA.
 */
function ecologie_generate_arithmetic_captcha() {
	$n1 = rand( 1, 9 );
	$n2 = rand( 1, 9 );
	$operand = rand( 1, 3 );
	
	switch ( $operand ) {
		case 1:
			$operand_str = '+';
			break;
		case 2:
			$operand_str = '-';
			break;
		case 3:
			$operand_str = '*';
			break;
	}
	
	return $n1 . ' ' . $operand_str . ' ' . $n2;
}

/**
 * Validates answer to arithmetic CAPTCHA against hidden CAPTCHA field value.
 *
 * @since 0.9
 *
 * @return Flag representing validity of CAPTCHA answer.
 */
function ecologie_validate_arithmetic_captcha_answer() {
	$arithmetic_captcha = $_POST['hidden-arithmetic-captcha'];
	return strlen( $arithmetic_captcha ) === 5 && eval( 'return ' . $arithmetic_captcha . ';' ) === intval( $_POST['captcha-answer'] );
}