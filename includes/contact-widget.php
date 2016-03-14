<?php

/**
 * Contact widget class.
 */
class ADZ_Contact_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'adz_contact_widget',
			__( 'Contact', 'A place where to place your contact information.' ),
			array( 'description' => 'A place where to place your contact information.', )
		);
	}
	
	/**
	 * Renders widget.
	 * @param args Widget area args.
	 * @param instance Widget settings.
	 */
	public function widget( $args, $instance ) {
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		?>
		<h4>Contact Us</h4>
		<p>
			<a href="tel:+356<?php echo esc_attr( $phone ); ?>"><i class="fa fa-phone"></i> +356 <?php echo esc_attr( $phone ); ?></a>
		</p>
		<p>
			<a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr( $email ); ?></a>
		</p>
		<?php
		
	}
	
	/**
	 * Renders widget settings form.
	 * @param instance Widget settings.
	 */
	public function form( $instance ) {
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		?>
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>">Phone</label>
		<input type="number" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"
			value="<?php echo esc_attr( $phone ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email</label>
		<input type="email" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>"
			value="<?php echo esc_attr( $email ); ?>">
		<?php
		
	}
	
	/**
	 * Updates widget settings.
	 * @param new_instance New widget settings.
	 * @param old_instance Old widget settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		return $instance;
	}
}