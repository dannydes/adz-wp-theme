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
 * Initialises global theme options variable.
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
 * Add "ecologie options" link to the "Appearance" menu.
 */
function ecologie_menu_options() {
	add_theme_page( 'Ecologie Options', 'Ecologie Options', 'edit_theme_options', 'ecologie-settings', 'ecologie_admin_options_page' );
}

add_action( 'admin_menu', 'ecologie_menu_options' );

/**
 * Renders theme options page.
 */
function ecologie_admin_options_page() {
	?>
	<p>Hello</p>
	<?php
}