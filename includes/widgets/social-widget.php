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
			<?php if ( ! empty( $instance['facebook'] ) ): ?>
				<a href="<?php echo esc_url( $instance['facebook'] ); ?>" title="Facebook" target="_blank" aria-label="Facebook">
					<div class="social-btn">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif;
			
			if ( ! empty( $instance['twitter'] ) ): ?>
				<a href="<?php echo esc_url( $instance['twitter'] ); ?>" title="Twitter" target="_blank" aria-label="Twitter">
					<div class="social-btn">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif;
			
			if ( ! empty( $instance['linkedin'] ) ): ?>
				<a href="<?php echo esc_url( $instance['linkedin'] ); ?>" title="LinkedIn" target="_blank" aria-label="LinkedIn">
					<div class="social-btn">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif;
			
			if ( ! empty( $instance['googleplus'] ) ): ?>
				<a href="<?php echo esc_url( $instance['googleplus'] ); ?>" title="Google+" target="_blank" aria-label="Google Plus">
					<div class="social-btn">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif;
			
			if ( ! empty( $instance['instagram'] ) ): ?>
				<a href="<?php echo esc_url( $instance['instagram'] ); ?>" title="Instagram" target="_blank" aria-label="Instagram">
					<div class="social-btn">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif;
			
			if ( ! empty( $instance['youtube'] ) ): ?>
				<a href="<?php echo esc_url( $instance['youtube'] ); ?>" title="Youtube" target="_blank" aria-label="Youtube">
					<div class="social-btn">
						<i class="fa fa-youtube" aria-hidden="true"></i>
					</div>
				</a>
			<?php endif; ?>
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
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$linkedin = $instance['linkedin'];
		$googleplus = $instance['googleplus'];
		$instagram = $instance['instagram'];
		$youtube = $instance['youtube'];
		
		?>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook</label>
		<input type="url" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>"
			value="<?php echo esc_attr( $facebook ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter</label>
		<input type="url" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>"
			value="<?php echo esc_attr( $twitter ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">LinkedIn</label>
		<input type="url" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>"
			value="<?php echo esc_attr( $linkedin ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>">Google+</label>
		<input type="url" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>"
			value="<?php echo esc_attr( $googleplus ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">Instagram</label>
		<input type="url" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>"
			value="<?php echo esc_attr( $instagram ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">Youtube</label>
		<input type="url" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>"
			value="<?php echo esc_attr( $youtube ); ?>">
		<?php
		
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
		
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ? strip_tags( $new_instance['facebook'] ) : '' );
		if ( ! empty( $new_instance['facebook'] ) && strpos( $instance['facebook'], 'facebook.com' ) === FALSE ) {
				$old_instance['errors']['facebook'] = 'Please enter a valid Facebook URL.';
				return FALSE;
		}
		
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ? strip_tags( $new_instance['twitter'] ) : '' );
		if ( ! empty( $new_instance['twitter'] ) && strpos( $instance['twitter'], 'twitter.com' ) === FALSE ) {
				$old_instance['errors']['twitter'] = 'Please enter a valid Twitter URL.';
				return FALSE;
		}
		
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ? strip_tags( $new_instance['linkedin'] ) : '' );
		if ( ! empty( $new_instance['linkedin'] ) && strpos( $instance['linkedin'], 'linkedin.com' ) === FALSE ) {
				$old_instance['errors']['linkedin'] = 'Please enter a valid LinkedIn URL.';
				return FALSE;
		}
		
		$instance['googleplus'] = ( ! empty( $new_instance['googleplus'] ) ? strip_tags( $new_instance['googleplus'] ) : '' );
		if ( ! empty( $new_instance['googleplus'] ) && strpos( $instance['googleplus'], 'plus.google.com' ) === FALSE ) {
				$old_instance['errors']['googleplus'] = 'Please enter a valid Google+ URL.';
				return FALSE;
		}
		
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ? strip_tags( $new_instance['instagram'] ) : '' );
		if ( ! empty( $new_instance['instagram'] ) && strpos( $instance['instagram'], 'instagram.com' ) === FALSE ) {
				$old_instance['errors']['instagram'] = 'Please enter a valid Instagram URL.';
				return FALSE;
		}
		
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ? strip_tags( $new_instance['youtube'] ) : '' );
		if ( ! empty( $new_instance['youtube'] ) && strpos( $instance['youtube'], 'youtube.com' ) === FALSE ) {
				$old_instance['errors']['youtube'] = 'Please enter a valid Youtube URL.';
				return FALSE;
		}
		
		return $instance;
	}
}