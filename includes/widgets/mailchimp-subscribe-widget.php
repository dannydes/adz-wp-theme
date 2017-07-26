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
		<h2 class="widgettitle">Subscribe to our newsletter</h2>
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
		
		if ( ! empty( $instance['error'] ) ): ?><p style="color:#f00"><?php echo $instance['error']; ?></p><?php endif; ?>
		<p>
			<input type="radio" id="<?php echo $this->get_field_id( 'input_choice_html' ); ?>" name="<?php echo $this->get_field_name( 'input_choice' ); ?>" value="html" checked>
			<label for="<?php echo $this->get_field_id( 'input_choice_html' ); ?>">Enter your form's generated HTML to extract User and Form IDs.</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'html' ); ?>">Original Form HTML</label>
			<textarea id="<?php echo $this->get_field_id( 'html' ); ?>" name="<?php echo $this->get_field_name( 'html' ); ?>" class="widefat" rows="20"><?php echo esc_attr( $instance['html'] ); ?></textarea>
		</p>
		<p>
			<input type="radio" id="<?php echo $this->get_field_id( 'input_choice_ids' ); ?>" name="<?php echo $this->get_field_name( 'input_choice' ); ?>" value="ids">
			<label for="<?php echo $this->get_field_id( 'input_choice_ids' ); ?>">Or if you know what what you're doing, enter your User and Form IDs in the fields below.</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'user_id' ); ?>">User ID</label>
			<input type="text" id="<?php echo $this->get_field_id( 'user_id' ); ?>" name="<?php echo $this->get_field_name( 'user_id' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['user_id'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'form_id' ); ?>">Form ID</label>
			<input type="text" id="<?php echo $this->get_field_id( 'form_id' ); ?>" name="<?php echo $this->get_field_name( 'form_id' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['form_id'] ); ?>">
		</p>
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
		
		$instance['error'] = '';
		
		if ( $new_instance['input_choice'] === 'html' && ! empty( $new_instance['html'] ) ) {
			$dom = new DOMDocument();
			$dom->loadHTML( $new_instance['html'] );
			$form = $dom->getElementById( 'mc-embedded-subscribe-form' );
			if ( $form === null ) {
				return self::updateError( $old_instance, 'Original HTML: Mailchimp form not found!' );
			}
			$action = $form->getAttribute( 'action' );
			
			$user_id_param_pos = strpos( $action, 'u=' );
			$form_id_param_pos = strpos( $action, 'id=' );
			
			if ( $user_id_param_pos === false || $form_id_param_pos === false ) {
				return self::updateError( $old_instance, 'Original HTML: User ID or Form ID not found!' );
			}
			
			$instance['user_id'] = strip_tags( substr( $action, $user_id_param_pos + 2, strpos( $action, '&' ) - $user_id_param_pos - 2 ) );
			$instance['form_id'] = strip_tags( substr( $action, $form_id_param_pos + 3 ) );
		} elseif ( $new_instance['input_choice'] === 'ids' ) {
			$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ? strip_tags( $new_instance['user_id'] ) : '' );
			$instance['form_id'] = ( ! empty( $new_instance['form_id'] ) ? strip_tags( $new_instance['form_id'] ) : '' );
		} else {
			return self::updateError( $old_instance, 'Original HTML: Cannot be left blank if selected!' );
		}
		
		return $instance;
	}
	
	/**
	 * Helper method to insert errors within the form $instance.
	 *
	 * @access private
	 *
	 * @since 0.9
	 *
	 * @param array $old_instance Old widget settings.
	 * @param string $error Instance error.
	 * @return array New widget settings.
	 */
	private function updateError( $old_instance, $error ) {
		$instance = array();
		$instance['user_id'] = $old_instance['user_id'];
		$instance['form_id'] = $old_instance['form_id'];
		$instance['error'] = $error;
		return $instance;
	}
}