<?php

require 'social-widget.php';
require 'contact-widget.php';
require 'recent-posts-widget.php';
require 'upcoming-event-widget.php';
require 'blogroll-widget.php';
require 'mailchimp-subscribe-widget.php';

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