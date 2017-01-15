<?php

/**
 * Blogroll widget class.
 */
class ADZ_Blogroll_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'adz_blogroll_widget',
			__( 'Blogroll', 'A space where to place your blogroll.' ),
			array( 'description' => __( 'Blogroll Widget', 'A space where to place your blogroll.' ), )
		);
	}
	
	/**
	 * Renders widget.
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param object $instance Widget settings.
	 */
	public function widget( $args, $instance ) {
		wp_list_bookmarks( array(
			'title_li' => 'Blogroll',
			'title_before' => '<h4>',
			'title_after' => '</h4>',
		) );
	}
}