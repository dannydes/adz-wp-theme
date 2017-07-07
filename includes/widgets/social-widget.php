<?php

/**
 * Social widget class.
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
			'url_part' => 'facebook.com'
		),
		array(
			'title' => 'Twitter',
			'code' => 'twitter',
			'url_part' => 'twitter.com'
		),
		array(
			'title' => 'LinkedIn',
			'code' => 'linkedin',
			'url_part' => 'linkedin.com'
		),
		array(
			'title' => 'Google Plus',
			'code' => 'google-plus',
			'url_part' => 'plus.google.com'
		),
		array(
			'title' => 'Instagram',
			'code' => 'instagram',
			'url_part' => 'instagram.com'
		),
		array(
			'title' => 'Youtube',
			'code' => 'youtube',
			'url_part' => 'youtube.com'
		),
	);
	
	/**
	 * Renders widget.
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param object $instance Widget settings.
	 */
	public function widget( $args, $instance ) { ?>
		<h2 class="widgettitle">Follow Us</h2>
		<div class="social-btns">
			<?php foreach ( self::SOCIAL_NETWORKS as $network ): ?>
				<?php if ( ! empty( $instance[$network['code']] ) ): ?>
					<a href="<?php echo esc_url( $instance[$network['code']] ); ?>" title="<?php echo $network['title']; ?>" target="_blank" aria-label="<?php echo $network['title']; ?>">
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
	 * @param object $instance Widget settings.
	 */
	public function form( $instance ) {
		foreach ( self::SOCIAL_NETWORKS as $network ): ?>
			<label for="<?php echo $this->get_field_id( $network['code'] ); ?>"><?php echo $network['title']; ?></label>
			<input type="url" id="<?php echo $this->get_field_id( $network['code'] ); ?>" name="<?php echo $this->get_field_name( $network['code'] ); ?>"
				value="<?php echo esc_attr( $instance[$network['code']] ); ?>"><br>
		<?php endforeach;
	}
	
	/**
	 * Updates widget settings.
	 *
	 * @access public
	 *
	 * @param object $new_instance New widget settings.
	 * @param object $old_instance Old widget settings.
	 * @return array Updated settings to save.
	 * @return boolean FALSE when setting update is to be cancelled due to invalid data entry.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$old_instance['errors'] = array();
		
		foreach ( self::SOCIAL_NETWORKS as $network ) {
			$instance[$network['code']] = ( ! empty( $new_instance[$network['code']] ) ? strip_tags( $new_instance[$network['code']] ) : '' );
			if ( ! empty( $new_instance[$network['code']] ) && strpos( $instance[$network['code']], $network['url_part'] ) === FALSE ) {
				$old_instance['errors'][$network['code']] = 'Please enter a valid Facebook URL.';
				return FALSE;
			}
		}
		
		return $instance;
	}
}