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
		<form action="//wordpress.us14.list-manage.com/subscribe/post?u=339dfe0090694d284c3a800bf&amp;id=d2c9c3a5c0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
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
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_339dfe0090694d284c3a800bf_d2c9c3a5c0" tabindex="-1" value=""></div>
			<input type="submit" class="btn btn-default" value="Subscribe">
		</form>
		<?php
		
	}
}