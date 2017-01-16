<?php

/**
 * Upcoming event widget class.
 */
class ADZ_Mailchimp_Subscribe_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'adz_mailchimp_subscribe_widget',
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
		<form>
			<label for="mailchimp-name">Name</label>
			<input type="text" id="mailchimp-name">
			<label for="mailchimp-surname">Surname</label>
			<input type="text" id="mailchimp-surname">
			<label for="mailchimp-email">Email</label>
			<input type="email" id="mailchimp-email">
			<input type="submit" value="Subscribe">
		</form>
		<?php
		
	}
}