<?php

/**
 * Upcoming event widget class.
 */
class ADZ_Upcoming_Event_Widget extends WP_Widget {
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'adz_upcoming_event_widget',
			__( 'Upcoming Event', 'A space where to place your upcoming event.' ),
			array( 'description' => __( 'Upcoming Event Widget', 'A space where to place your upcoming event.' ), )
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
		?><h4><?php echo esc_attr( $instance['title'] ); ?></h4>
		<?php echo esc_attr( $instance['time'] ); ?><br>
		<?php echo esc_attr( $instance['date'] ); ?><br>
		<?php echo esc_attr( $instance['venue'] ); ?>
		<p><?php echo esc_attr( $instance['description'] ); ?></p>
		<a href="<?php echo esc_url( $instance['event_url'] ); ?>" target="_blank" role="button" class="btn btn-default">More info...</a><?php
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param object $instance Widget settings.
	 */
	public function form( $instance ) {
		?><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'time' ); ?>">Time</label>
		<input type="time" id="<?php echo $this->get_field_id( 'time' ); ?>" name="<?php echo $this->get_field_name( 'time' ); ?>" value="<?php echo esc_attr( $instance['time'] ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'date' ); ?>">Date</label>
		<input type="date" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" value="<?php echo esc_attr( $instance['date'] ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'venue' ); ?>">Venue</label>
		<input type="text" id="<?php echo $this->get_field_id( 'venue' ); ?>" name="<?php echo $this->get_field_name( 'venue' ); ?>" value="<?php echo esc_attr( $instance['venue'] ); ?>"><br>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>">Description</label>
		<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr( $instance['description'] ); ?></textarea><br>
		<label for="<?php echo $this->get_field_id( 'event_url' ); ?>">Event URL</label>
		<input type="url" id="<?php echo $this->get_field_id( 'event_url' ); ?>" name="<?php echo $this->get_field_name( 'event_url' ); ?>" value="<?php echo esc_attr( $instance['event_url'] ); ?>"><?php
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
		if ( ( ! empty( $new_instance['time'] ) || ! empty( $new_instance['date'] ) ) && DateTime::createFromFormat( 'd-m-Y H:i', $new_instance['date'] . ' ' . $new_instance['time'] ) === FALSE ) {
			return FALSE;
		}
		
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '' );
		$instance['time'] = ( ! empty( $new_instance['time'] ) ? strip_tags( $new_instance['time'] ) : '' );
		$instance['date'] = ( ! empty( $new_instance['date'] ) ? strip_tags( $new_instance['date'] ) : '' );
		$instance['venue'] = ( ! empty( $new_instance['venue'] ) ? strip_tags( $new_instance['venue'] ) : '' );
		$instance['description'] = ( ! empty( $new_instance['description'] ) ? strip_tags( $new_instance['description'] ) : '' );
		$instance['event_url'] = ( ! empty( $new_instance['event_url'] ) ? strip_tags( $new_instance['event_url'] ) : '' );
		return $instance;
	}
}