<?php

require 'includes/widgets/social-widget.php';
require 'includes/widgets/contact-widget.php';
require 'includes/widgets/recent-posts-widget.php';
require 'includes/widgets/upcoming-event-widget.php';
require 'includes/widgets/blogroll-widget.php';
require 'includes/widgets/mailchimp-subscribe-widget.php';

/**
 * Tells WordPress to enable certain features.
 */
function ecologie_setup() {
	add_theme_support( 'custom-header' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height' => 30,
		'width' => 30,
		'flex-height' => false,
		'flex-width' => false,
	) );
}

add_action( 'after_setup_theme', 'ecologie_setup' );

/**
 * Registers menus.
 */
function ecologie_register_menus() {
	register_nav_menus(array(
		'primary' => __( 'Primary Menu', 'ecologie' ),
		'bottom' => __( 'Footer Bottom Menu', 'ecologie' ),
	));
}

add_action( 'init', 'ecologie_register_menus' );

/**
 * Adds CSS classes to menu items depending on needs.
 *
 * @param array $classes CSS classes of current menu item.
 * @param string $item Current menu item.
 * @return array New CSS classes.
 */
function ecologie_menu_css_class( $classes, $item ) {
	// Handles active menu items.
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'active';
	}
	
	// Handles menu items with submenus.
	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$classes[] = 'dropdown';
	}
	
	return $classes;
}

add_filter( 'nav_menu_css_class', 'ecologie_menu_css_class', 10, 2 );

/**
 * Inserts sidebar button into primary menu.
 *
 * @param string $items HTML markup representing menu items.
 * @param object $args Menu arguments.
 * @return string Markup to replace the original.
 */
function ecologie_insert_sidebar_button( $items, $args ) {
	if ( $args->theme_location !== 'primary' ) {
		return $items;
	}
	
	$dom = new DOMDocument();
	$dom->loadHTML( $items );
	$link = $dom->createElement( 'a' );
	$link->setAttribute( 'href', '#sidebar' );
	$link_text = $dom->createTextNode( 'Sidebar' );
	$link->appendChild( $link_text );
	$li = $dom->createElement( 'li' );
	$li->setAttribute( 'id', 'sidebar-button' );
	$li->appendChild( $link );
	$dom->appendChild( $li );
	return $dom->saveHTML();
}

add_filter( 'wp_nav_menu_items', 'ecologie_insert_sidebar_button', 10, 2 );

/**
 * Enqueues the theme's scripts and styles.
 */
function ecologie_enqueue_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );
	
	wp_enqueue_style( 'base-css', get_template_directory_uri() . '/style.css', '', $theme_version );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '', '4.7' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mailchimp', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js', '', '', TRUE );
	wp_enqueue_script( 'base-js', get_template_directory_uri() . '/script.js', array( 'jquery', 'mailchimp' ) , $theme_version, TRUE );
	wp_enqueue_script( 'addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56aa8d91c91a4535', '', '', TRUE );
}

add_action( 'wp_enqueue_scripts', 'ecologie_enqueue_scripts' );

/**
 * Makes AddThis script non-blocking.
 *
 * @param string $tag <script> markup.
 * @param string $handle Script handle.
 * @return string <script> markup.
 */

function ecologie_addthis_add_async( $tag, $handle ) {
	if ( 'addthis' !== $handle ) {
		return $tag;
	}
	
	return str_replace( ' src', ' async="async" src', $tag );
}

add_filter( 'script_loader_tag', 'ecologie_addthis_add_async', 10, 2 );

/**
 * Registers widgets and widget areas.
 */
function ecologie_widgets_init() {
	register_widget( 'Ecologie_Contact_Widget' );
	register_widget( 'Ecologie_Social_Widget' );
	register_widget( 'Ecologie_Recent_Posts_Widget' );
	register_widget( 'Ecologie_Upcoming_Event_Widget' );
	register_widget( 'Ecologie_Blogroll_Widget' );
	register_widget( 'Ecologie_Mailchimp_Subscribe_Widget' );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 1', 'ecologie_footer_col_1' ),
		'id' => 'footer-col-1',
		'description' => '1st footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 2', 'ecologie_footer_col_2' ),
		'id' => 'footer-col-2',
		'description' => '2nd footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 3', 'ecologie_footer_col_3' ),
		'id' => 'footer-col-3',
		'description' => '3rd footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 4', 'ecologie_footer_col_4' ),
		'id' => 'footer-col-4',
		'description' => '4th footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar', 'ecologie_sidebar' ),
		'id' => 'sidebar',
		'description' => 'Sidebar.',
		'before_widget' => '',
		'after_widget' => '',
	) );
}

add_action( 'widgets_init', 'ecologie_widgets_init' );

/**
 * Changes the excerpt length.
 *
 * @param integer $length Current excerpt length.
 * @return integer New excerpt length.
 */
function ecologie_custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'ecologie_custom_excerpt_length', 999 );

/**
 * Renders a post excerpt's "Read more" button.
 * @return string The "Read more" button.
 */
function ecologie_excerpt_more() {
	return '<a class="btn btn-default" href="' .
		esc_url( get_permalink( get_the_ID() ) ) .
		'">' . __( 'Read more...', 'ecologie' ) .
		'</a>';
}

add_filter( 'excerpt_more', 'ecologie_excerpt_more' );

//Hack from Eazy Enable Blogroll plugin to reenable links manager
if( get_bloginfo( 'version' ) >= 3.5 ) {
  add_filter( 'pre_option_link_manager_enabled', '__return_true' );
}

/**
 * Loads backend scripts.
 */
function ecologie_admin_enqueue_scripts() {
	wp_enqueue_script( 'admin-base-js', get_template_directory_uri() . '/js/admin-script.js', 'jquery', '', TRUE );
}

add_action( 'admin_enqueue_scripts', 'ecologie_admin_enqueue_scripts' );

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