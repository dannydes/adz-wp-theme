<?php

/**
 * Contact widget class.
 *
 * @extends WP_Widget
 */
class Ecologie_Contact_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_contact_widget',
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
	 * @param array $instance Widget instance settings.
	 */
	public function widget( $args, $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone_country_code = $instance['phone_country_code'];
		$phone = ( isset( $instance['phone'] ) ? $instance['phone'] : null );
		$email = ( isset( $instance['email'] ) ? $instance['email'] : null );
		
		?>
		<h2 class="widgettitle">Contact Us</h2>
		<?php if ( ! empty( $address_line_1 ) ||
				! empty( $address_line_2 ) ||
				! empty( $address_line_3 ) ||
				! empty( $address_line_4 ) ): ?>
		<p>
			<i class="fa fa-map-marker"></i>
			<span class="contact-widget-text">
				<?php echo esc_attr( $address_line_1 ); ?>,<br>
				<?php echo esc_attr( $address_line_2 ); ?>,<br>
				<?php echo esc_attr( $address_line_3 ); ?>,<br>
				<?php echo esc_attr( $address_line_4 ); ?>.
			</span>
		</p>
		<?php endif;
		
		if ( ! empty( $phone ) ): ?>
		<p>
			<a href="tel:+<?php echo esc_attr( $phone_country_code . $phone ); ?>"><i class="fa fa-phone"></i> <span class="contact-widget-text">+<?php echo esc_attr( $phone_country_code ); ?> <?php echo esc_attr( $phone ); ?></span></a>
		</p>
		<?php endif;
		
		if ( ! empty( $email ) ): ?>
		<p>
			<a href="mailto:<?php echo esc_attr( $email ); ?>"><i class="fa fa-envelope"></i> <span class="contact-widget-text"><?php echo esc_attr( $email ); ?></span></a>
		</p>
		<?php endif;
		
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @uses self::getCountryCallingCodes()
	 *
	 * @param array $instance Widget instance settings.
	 */
	public function form( $instance ) {
		$address_line_1 = $instance['address_line_1'];
		$address_line_2 = $instance['address_line_2'];
		$address_line_3 = $instance['address_line_3'];
		$address_line_4 = $instance['address_line_4'];
		$phone_country_code = $instance['phone_country_code'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		$country_codes = self::getCountryCallingCodes();
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_1' ); ?>">Address Line 1</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_1' ); ?>" name="<?php echo $this->get_field_name( 'address_line_1' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_1 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_2' ); ?>">Address Line 2</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_2' ); ?>" name="<?php echo $this->get_field_name( 'address_line_2' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_2 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_3' ); ?>">Address Line 3</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_3' ); ?>" name="<?php echo $this->get_field_name( 'address_line_3' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_3 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'address_line_4' ); ?>">Address Line 4</label>
			<input type="text" id="<?php echo $this->get_field_id( 'address_line_4' ); ?>" name="<?php echo $this->get_field_name( 'address_line_4' ); ?>"
				class="widefat" value="<?php echo esc_attr( $address_line_4 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone_country_code' ); ?>">Phone Country Code</label>
			<select id="<?php echo $this->get_field_id( 'phone_country_code' ); ?>" name="<?php echo $this->get_field_name( 'phone_country_code' ); ?>" class="widefat">
			<?php if ( $country_codes !== false ): ?>
				<?php foreach ( $country_codes as $country ): ?>
					<?php foreach ( $country->callingCodes as $code ): ?>
						<option value="<?php echo $code; ?>"<?php if ( $code === $instance['phone_country_code'] ): ?> selected<?php endif; ?>><?php echo $country->name; ?> (<?php echo $code; ?>)</option>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>">Phone</label>
			<input type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>"
				class="widefat" value="<?php echo esc_attr( $phone ); ?>">
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['phone'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['phone']; ?>
			</span>
			<?php endif; ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email</label>
			<input type="email" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>"
				class="widefat" value="<?php echo esc_attr( $email ); ?>">
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['email'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['email']; ?>
			</span>
			<?php endif; ?>
		</p>
		<?php
		
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
		
		$instance['errors'] = array();
		
		if ( ! empty( $new_instance['phone'] ) && is_numeric( $new_instance['phone'] ) ) {
			$instance['phone'] = strip_tags( $new_instance['phone'] );
		} elseif ( ! empty( $new_instance['phone'] ) ) {
			$instance['phone'] = $old_instance['phone'];
			$instance['errors']['phone'] = 'Phone is not a number!';
		}
		
		$instance['phone_country_code'] = ( ! empty( $new_instance['phone_country_code'] ) ? strip_tags( $new_instance['phone_country_code'] ) : '' );
		
		if ( ! empty( $new_instance['email'] ) && is_email( $new_instance['email'] ) ) {
			$instance['email'] = strip_tags( $new_instance['email'] );
		} elseif ( ! empty( $new_instance['email'] ) ) {
			$instance['email'] = $old_instance['email'];
			$instance['errors']['email'] = 'Email format incorrect!';
		}
		
		$instance['address_line_1'] = ( ! empty( $new_instance['address_line_1'] ) ? strip_tags( $new_instance['address_line_1'] ) : '' );
		$instance['address_line_2'] = ( ! empty( $new_instance['address_line_2'] ) ? strip_tags( $new_instance['address_line_2'] ) : '' );
		$instance['address_line_3'] = ( ! empty( $new_instance['address_line_3'] ) ? strip_tags( $new_instance['address_line_3'] ) : '' );
		$instance['address_line_4'] = ( ! empty( $new_instance['address_line_4'] ) ? strip_tags( $new_instance['address_line_4'] ) : '' );
		
		return $instance;
	}
	
	/**
	 * Fetches country calling codes from restcountries.eu API.
	 *
	 * @since 0.9.1
	 *
	 * @access private
	 *
	 * @return mixed False if request fails or calling codes array otherwise.
	 */
	private function getCountryCallingCodes() {
		$req = wp_remote_get( 'https://restcountries.eu/rest/v2/all?fields=name;callingCodes' );
		
		if ( is_wp_error( $req ) ) {
			return false;
		}
		
		$body = wp_remote_retrieve_body( $req );
		
		return array_filter( json_decode( $body ), function ( $country ) {
			return ! empty( $country->callingCodes[0] );
		});
	}
}