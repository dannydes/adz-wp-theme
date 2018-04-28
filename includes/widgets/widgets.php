<?php

/**
 * Registers widgets and widget areas.
 */
function ecologie_widgets_init() {
	register_widget( 'Ecologie_Contact_Widget' );
	register_widget( 'Ecologie_Social_Widget' );
	register_widget( 'Ecologie_Upcoming_Event_Widget' );
	register_widget( 'Ecologie_Mailchimp_Subscribe_Widget' );
	register_widget( 'Ecologie_Search_Widget' );
	
	register_sidebar( array(
		'name' => __( 'Header', 'ecologie_header' ),
		'id' => 'header',
		'description' => __( 'Header.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 1', 'ecologie_footer_col_1' ),
		'id' => 'footer-col-1',
		'description' => __( '1st footer column.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 2', 'ecologie_footer_col_2' ),
		'id' => 'footer-col-2',
		'description' => __( '2nd footer column.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 3', 'ecologie_footer_col_3' ),
		'id' => 'footer-col-3',
		'description' => __( '3rd footer column.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Column 4', 'ecologie_footer_col_4' ),
		'id' => 'footer-col-4',
		'description' => __( '4th footer column.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar', 'ecologie_sidebar' ),
		'id' => 'sidebar',
		'description' => __( 'Sidebar.', 'ecologie' ),
		'before_widget' => '',
		'after_widget' => '',
	) );
}

add_action( 'widgets_init', 'ecologie_widgets_init' );