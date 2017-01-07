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
	 *
	 * @access public
	 *
	 * @param array $args Widget area args.
	 * @param object $instance Widget settings.
	 */
	public function widget( $args, $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		?>
		<h4>Contact Us</h4>
		<?php if ( ! empty( $address_line_1 ) ||
				! empty( $address_line_2 ) ||
				! empty( $address_line_3 ) ||
				! empty( $address_line_4 ) ): ?>
		<p>
			<i class="fa fa-map-marker"></i>
			<?php echo esc_attr( $address_line_1 ); ?>,<br>
			<?php echo esc_attr( $address_line_2 ); ?>,<br>
			<?php echo esc_attr( $address_line_3 ); ?>,<br>
			<?php echo esc_attr( $address_line_4 ); ?>.
		</p>
		<?php endif;
		
		if ( ! empty( $phone ) ): ?>
		<p>
			<a href="tel:+356<?php echo esc_attr( $phone ); ?>"><i class="fa fa-phone"></i> +356 <?php echo esc_attr( $phone ); ?></a>
		</p>
		<?php endif;
		
		if ( ! empty( $email ) ): ?>
		<p>
			<a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr( $email ); ?></a>
		</p>
		<?php endif;
		
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param object $instance Widget settings.
	 */
	public function form( $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		?>
		<label for="<?php echo $this->get_field_id( 'address_line_1' ); ?>">Address Line 1</label>
		<input type="text" id="<?php echo $this->get_field_id( 'address_line_1' ); ?>" name="<?php echo $this->get_field_name( 'address_line_1' ); ?>"
			value="<?php echo esc_attr( $address_line_1 ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'address_line_2' ); ?>">Address Line 2</label>
		<input type="text" id="<?php echo $this->get_field_id( 'address_line_2' ); ?>" name="<?php echo $this->get_field_name( 'address_line_2' ); ?>"
			value="<?php echo esc_attr( $address_line_2 ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'address_line_3' ); ?>">Address Line 3</label>
		<input type="text" id="<?php echo $this->get_field_id( 'address_line_3' ); ?>" name="<?php echo $this->get_field_name( 'address_line_3' ); ?>"
			value="<?php echo esc_attr( $address_line_3 ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'address_line_4' ); ?>">Address Line 4</label>
		<input type="text" id="<?php echo $this->get_field_id( 'address_line_4' ); ?>" name="<?php echo $this->get_field_name( 'address_line_4' ); ?>"
			value="<?php echo esc_attr( $address_line_4 ); ?>"><br>
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
	 *
	 * @access public
	 *
	 * @param object $new_instance New widget settings.
	 * @param object $old_instance Old widget settings.
	 *
	 * @return Widget settings to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		return $instance;
	}
}