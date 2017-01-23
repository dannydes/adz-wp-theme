<?php

/**
 * Upcoming event widget class.
 */
class Ecologie_Mailchimp_Subscribe_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_mailchimp_subscribe_widget',
			__( 'Mailchimp Subscribe', 'A space where to gather subscriptions.' ),
			array( 'description' => __( 'Mailchimp Subscribe Widget', 'A space where to gather subscriptions.' ), )
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
		<h4>Subscribe to our newsletter</h4>
		<form action="//wordpress.us14.list-manage.com/subscribe/post?u=<?php echo esc_attr( $instance['user_id'] ); ?>&amp;id=<?php echo esc_attr( $instance['form_id'] ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div class="form-group">
				<label for="mailchimp-name">Name</label>
				<input type="text" id="mailchimp-name" name="FNAME" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="mailchimp-surname">Surname</label>
				<input type="text" id="mailchimp-surname" name="LNAME" class="form-control" placeholder="Surname">
			</div>
			<div class="form-group">
				<label for="mailchimp-email">Email</label>
				<input type="email" id="mailchimp-email" name="EMAIL" class="form-control" placeholder="Email">
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_<?php echo esc_attr( $instance['user_id'] ); ?>_<?php echo esc_attr( $instance['form_id'] ); ?>" tabindex="-1" value=""></div>
			<input type="submit" class="btn btn-default" value="Subscribe">
		</form>
		<?php
		
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
		<label for="<?php echo $this->get_field_id( 'user_id' ); ?>">User ID</label>
		<input type="text" id="<?php echo $this->get_field_id( 'user_id' ); ?>" name="<?php echo $this->get_field_name( 'user_id' ); ?>" value="<?php echo esc_attr( $instance['user_id'] ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'form_id' ); ?>">Form ID</label>
		<input type="text" id="<?php echo $this->get_field_id( 'form_id' ); ?>" name="<?php echo $this->get_field_name( 'form_id' ); ?>" value="<?php echo esc_attr( $instance['form_id'] ); ?>">
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
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ? strip_tags( $new_instance['user_id'] ) : '' );
		$instance['form_id'] = ( ! empty( $new_instance['form_id'] ) ? strip_tags( $new_instance['form_id'] ) : '' );
		return $instance;
	}
}