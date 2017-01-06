<?php

/**
 * Blogroll widget class.
 */
class ADZ_Blogroll_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 * 
	 * @access public
	 */
	function __construct() {
		parent::__construct(
			'adz_blogroll_widget',
			__( 'Blogroll', 'A space for showcasing other nice blogs.' ),
			array( 'description' => __( 'Blogroll Widget', 'A space for showcasing other nice blogs.' ), )
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
		?>
		<h4>Blogroll</h4>
		<?php
		
		$urls = explode( '\n', $instance['blog-urls'] );
		
		foreach ( $urls as $url ): ?>
		<a href="<?php echo esc_attr( $url ); ?>" target="_blank"><?php echo $url; ?></a>
		<?php endforeach;
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param object $instance Widget settings.
	 */
	public function form( $instance ) {
		?>
		<label for="<?php echo $this->get_field_id( 'blog-urls' ); ?>">Blog URLs</label>
		<p>Please enter URLs in the text box below. Seperate them by starting a new line.</p>
		<textarea id="<?php echo $this->get_field_id( 'blog-urls' ); ?>" name="<?php echo $this->get_field_id( 'blog-urls' ); ?>">
			<?php echo esc_attr( $instance['blog-urls'] ); ?>
		</textarea>
		<?php
	}
	
	/**
	 * Updates widget settings.
	 *
	 * @access public
	 *
	 * @param object $new_instance New widget settings.
	 * @param object $old_instance Old widget settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['blog-urls'] = ( ! empty( $new_instance['blog-urls'] ) ? strip_tags( $new_instance['blog-urls'] ) : '' );
		return $instance;
	}
}