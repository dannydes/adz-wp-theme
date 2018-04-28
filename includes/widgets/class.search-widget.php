<?php

/**
 * Search widget class.
 *
 * @extends WP_Widget
 */
class Ecologie_Search_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_search_widget',
			__( 'Ecologie Search', 'A search bar compatible with the look and feel of Ecologie.' ),
			array( 'description' => __( 'Ecologie Search Widget', 'A search bar compatible with the look and feel of Ecologie.' ), )
		);
	}
	
	/**
	 * Renders widget.
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param array $instance Widget instance settings.
	 */
	public function widget( $args, $instance ) {
		?><form action="<?php echo esc_url( get_site_url() ); ?>" method="get">
			<input class="form-control" type="text" name="s" placeholder="Search" />
			<button class="btn btn-default" type="submit">
				<i class="fa fa-search"></i>
			</button>
		</form><?php
	}
}