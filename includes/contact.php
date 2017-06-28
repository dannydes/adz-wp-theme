<?php

function contact_us_shortcode( $atts ) {
	return ( empty( $atts['at'] ) ? '<p>Specify "at" attribute.</p>' : '' ) .
	'<form id="contact-us" action="#" method="post">
		<div class="form-group">
			<label for="contact-name">Your name</label>
			<input type="text" class="form-control" id="contact-name" name="name" placeholder="Your name">
		</div>
		<div class="form-group">
			<label for="contact-email">Your email</label>
			<input type="email" class="form-control" id="contact-email" name="email" placeholder="Your email">
		</div>
		<div class="form=group">
			<label for="contact-subject">Your subject</label>
			<input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Your subject">
		</div>
		<div class="form-group">
			<label for="contact-message">Your message</label>
			<textarea class="form-control" id="contact-message" name="message" placeholder="Your message"></textarea>
		</div>
		<div class="checkbox">
			<label for="contact-copy"><input type="checkbox" id="contact-copy"> Send me a copy</label>
		</div>
		<input type="hidden" id="contact-hidden" name="hidden">
		<input type="hidden" id="contact-at" name="at" value="' . ( ! empty( $atts['at'] ) ? $atts['at'] : '' ) . '">
		<button type="submit" class="btn btn-default">Send message</button>
	</form>';
}

add_shortcode( 'contact-us', 'contact_us_shortcode' );

function ecologie_ajax_contact_us() {
	if ( ! empty( $_POST['hidden'] ) || empty( $_POST['name'] ) || empty( $_POST['email'] ) || empty( $_POST['message'] ) || empty( $_POST['at'] ) ) {
		wp_die( 0 );
	}
	
	$from = 'From: ' . $_POST['name'] . ' <' . $_POST['email'] . '>';
	
	$headers = array(
		$from,
	);
	
	if ( $_POST['forward-copy'] === 'true' ) {
		$headers[] = 'Cc: ' . $_POST['name'] . ' <' . $_POST['email'] . '>';
	}
	
	$message = $from . "\n\n" . $_POST['message'];

	$success = wp_mail( $_POST['at'], $_POST['subject'], $message, $headers );
	
	if ( $success ) {
		wp_die( 1 );
	}
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
	$phpmailer->Host = get_theme_mod( 'contact_sc_smtp_host' );
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = get_theme_mod( 'contact_sc_smtp_secure_conn_method' );
	$phpmailer->Port = get_theme_mod( 'contact_sc_smtp_port' );
	$phpmailer->Username = get_theme_mod( 'contact_sc_smtp_username' );
	$phpmailer->Password = get_theme_mod( 'contact_sc_smtp_password' );
	
	if ( is_localhost() && production_mode_disabled() ) {
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