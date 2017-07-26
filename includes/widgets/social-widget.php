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
		array(
			'title' => 'Github',
			'code' => 'github',
			'url_part' => 'github.com'
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
			<p>
				<label for="<?php echo $this->get_field_id( $network['code'] ); ?>"><?php echo $network['title']; ?></label>
				<input type="url" id="<?php echo $this->get_field_id( $network['code'] ); ?>" name="<?php echo $this->get_field_name( $network['code'] ); ?>"
					class="widefat" value="<?php echo esc_attr( $instance[$network['code']] ); ?>">
				<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors'][$network['code']] ) ): ?>
				<span style="color:#f00">
					<?php echo $instance['errors'][$network['code']]; ?>
				</span>
				<?php endif; ?>
			</p>
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
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['errors'] = array();
		
		foreach ( self::SOCIAL_NETWORKS as $network ) {
			if ( ! empty( $new_instance[$network['code']] ) && strpos( $new_instance[$network['code']], $network['url_part'] ) === false ) {
				$instance[$network['code']] = $old_instance[$network['code']];
				$instance['errors'][$network['code']] = 'Please enter a valid ' . $network['title'] . ' URL.' ;
			} elseif ( ! empty( $new_instance[$network['code']] ) ) {
				$instance[$network['code']] = strip_tags( $new_instance[$network['code']] );
			}
		}
		
		return $instance;
	}
}