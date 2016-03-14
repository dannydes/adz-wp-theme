<?php

require 'includes/social-widget.php';
require 'includes/contact-widget.php';

/**
 * Registers menu and tells WordPress to enable certain features.
 */
function adz_setup() {
	register_nav_menus(array(
		'primary' => __( 'Primary Menu', 'adz' ),
	));
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
}

add_action( 'after_setup_theme', 'adz_setup' );

/**
 * Adds CSS classes to menu items depending on needs.
 * @param classes CSS classes of current menu item.
 * @param item Current menu item.
 * @return New CSS classes.
 */
function adz_menu_css_class( $classes, $item ) {
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

add_filter( 'nav_menu_css_class', 'adz_menu_css_class', 10, 2 );

/**
 * Enqueues the theme's scripts and styles.
 */
function adz_enqueue_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/static/bootstrap/css/bootstrap.min.css', '', '3' );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'base-css', get_template_directory_uri() . '/style.css', '', '0.4' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/static/bootstrap/js/bootstrap.min.js', 'jquery', '3', TRUE );
}

add_action( 'wp_enqueue_scripts', 'adz_enqueue_scripts' );

/**
 * Registers widgets and widget areas.
 */
function adz_widgets_init() {
	register_widget( 'ADZ_Contact_Widget' );
	register_widget( 'ADZ_Social_Widget' );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 1', 'adz_footer_col_1' ),
		'id' => 'footer-col-1',
		'description' => '1st footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 2', 'adz_footer_col_2' ),
		'id' => 'footer-col-2',
		'description' => '2nd footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 3', 'adz_footer_col_3' ),
		'id' => 'footer-col-3',
		'description' => '3rd footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 4', 'adz_footer_col_4' ),
		'id' => 'footer-col-4',
		'description' => '4th footer column.',
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar', 'adz_sidebar' ),
		'id' => 'sidebar',
		'description' => 'Sidebar.',
		'before_widget' => '',
		'after_widget' => '',
	) );
}

add_action( 'widgets_init', 'adz_widgets_init' );

/**
 * Changes the excerpt length.
 * @param length Current excerpt length.
 * @return New excerpt length.
 */
function adz_custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'adz_custom_excerpt_length', 999 );

/**
 * Renders a post excerpt's "Read more" button.
 * @return The "Read more" button.
 */
function adz_excerpt_more() {
	return '<a class="btn btn-default" href="' .
		esc_url( get_permalink( get_the_ID() ) ) .
		'">' . __( 'Read more...', 'adz' ) .
		'</a>';
}

add_filter( 'excerpt_more', 'adz_excerpt_more' );