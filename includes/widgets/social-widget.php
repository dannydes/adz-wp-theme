<?php

/**
 * Social widget class.
 *
 * @extends WP_Widget
 */
class Ecologie_Social_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_social_widget',
			__( 'Social Buttons', 'A place where to place your social buttons.' ),
			array( 'description' => __( 'Social Buttons Widget', 'A place where to place your social buttons.' ), )
		);
	}
	
	/**
	 * Holds list of supported social networks.
	 *
	 * @access private
	 */
	private const SOCIAL_NETWORKS = array(
		array(
			'title' => 'Facebook',
			'code' => 'facebook',
			'url_format' => 'https://www.facebook.com/'
		),
		array(
			'title' => 'Twitter',
			'code' => 'twitter',
			'url_format' => 'https://www.twitter.com/'
		),
		array(
			'title' => 'LinkedIn',
			'code' => 'linkedin',
			'url_format' => 'https://www.linkedin.com/in/'
		),
		array(
			'title' => 'Google Plus',
			'code' => 'google-plus',
			'url_format' => 'https://plus.google.com/'
		),
		array(
			'title' => 'Instagram',
			'code' => 'instagram',
			'url_format' => 'https://www.instagram.com/'
		),
		array(
			'title' => 'Youtube',
			'code' => 'youtube',
			'url_format' => 'https://www.youtube.com/user/'
		),
		array(
			'title' => 'Github',
			'code' => 'github',
			'url_format' => 'https://www.github.com/'
		),
	);
	
	/**
	 * Renders widget.
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param array $instance Widget instance settings.
	 */
	public function widget( $args, $instance ) { ?>
		<h2 class="widgettitle">Follow Us</h2>
		<div class="social-btns">
			<?php foreach ( self::SOCIAL_NETWORKS as $network ): ?>
				<?php if ( ! empty( $instance[$network['code']] ) ): ?>
					<a href="<?php echo esc_url( $network['url_format'] . $instance[$network['code']] ); ?>" title="<?php echo $network['title']; ?>" target="_blank" aria-label="<?php echo $network['title']; ?>">
						<div class="social-btn">
							<i class="fa fa-<?php echo $network['code']; ?>" aria-hidden="true"></i>
						</div>
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div><?php
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param array $instance Widget instance settings.
	 */
	public function form( $instance ) {
		foreach ( self::SOCIAL_NETWORKS as $network ): ?>
			<p>
				<label for="<?php echo $this->get_field_id( $network['code'] ); ?>"><?php echo $network['title']; ?></label><br>
				<strong><?php echo $network['url_format']; ?></strong>
				<input type="url" id="<?php echo $this->get_field_id( $network['code'] ); ?>" name="<?php echo $this->get_field_name( $network['code'] ); ?>"
					class="widefat" value="<?php echo esc_attr( $instance[$network['code']] ); ?>">
			</p>
		<?php endforeach;
	}
	
	/**
	 * Updates widget settings.
	 *
	 * @access public
	 *
	 * @param array $new_instance New widget instance settings.
	 * @param array $old_instance Old widget instance settings.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		foreach ( self::SOCIAL_NETWORKS as $network ) {
			$instance[$network['code']] = ( ! empty( $new_instance[$network['code']] ) ? strip_tags( $new_instance[$network['code']] ) : '' );
		}
		
		return $instance;
	}
}