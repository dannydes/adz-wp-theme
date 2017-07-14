<?php

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
	if ( $args->theme_location !== 'primary' || ! get_theme_mod( 'sidebar_on', $GLOBALS['ecologie_default_options']['header_on'] ) ) {
		return $items;
	}
	
	$dom = new DOMDocument();
	$link = $dom->createElement( 'a' );
	$link->setAttribute( 'href', '#sidebar' );
	$link_text = $dom->createTextNode( 'Sidebar' );
	$link->appendChild( $link_text );
	$li = $dom->createElement( 'li' );
	$li->setAttribute( 'id', 'sidebar-button' );
	$li->appendChild( $link );
	$dom->appendChild( $li );
	return $items . $dom->saveHTML();
}

add_filter( 'wp_nav_menu_items', 'ecologie_insert_sidebar_button', 10, 2 );