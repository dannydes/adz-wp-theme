<?php

/**
 * Upcoming event widget class.
 */
class Ecologie_Upcoming_Event_Widget extends WP_Widget {
	/**
	 * Array holding months.
	 */
	const MONTHS = array(
		array(
			'name' => 'January',
			'days' => 31,
		),
		array(
			'name' => 'February',
		),
		array(
			'name' => 'March',
			'days' => 31,
		),
		array(
			'name' => 'April',
			'days' => 30,
		),
		array(
			'name' => 'May',
			'days' => 31,
		),
		array(
			'name' => 'June',
			'days' => 30,
		),
		array(
			'name' => 'July',
			'days' => 31,
		),
		array(
			'name' => 'August',
			'days' => 31,
		),
		array(
			'name' => 'September',
			'days' => 30,
		),
		array(
			'name' => 'October',
			'days' => 31,
		),
		array(
			'name' => 'November',
			'days' => 30,
		),
		array(
			'name' => 'December',
			'days' => 31,
		),
	);
	
	/**
	 * Widget constructor.
	 */
	function __construct() {
		parent::__construct(
			'ecologie_upcoming_event_widget',
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
		<?php echo esc_attr( $instance['hour'] ) . ' : ' . ( intval( $instance['minute'] ) < 10 ? '0' : '' ) . esc_attr( $instance['minute'] ) . ' ' . esc_attr( $instance['meridiem'] ); ?><br>
		<?php echo esc_attr( $instance['day'] ); if ( $instance['day'] === '1' ): ?>st<?php elseif ( $instance['day'] === '2' ): ?>nd<?php elseif ( $instance['day'] === '3' ): ?>rd<?php else: ?>th<?php endif; ?> <?php echo self::MONTHS[$instance['month']]['name'] ?> <?php echo esc_attr( $instance['year'] ); ?><br>
		<?php echo esc_attr( $instance['venue'] ); var_dump($instance['month']);?>
		<p><?php echo esc_attr( $instance['description'] ); ?></p>
		<a href="<?php echo esc_url( $instance['event_url'] ); ?>" target="_blank" role="button" class="btn btn-default">More info...</a><?php var_dump(intval( $instance['month'] ) >= intval( date( 'm' ) ) - 1 || intval( $instance['year'] ) > intval( date( 'Y' ) ));
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
		<label for="<?php echo $this->get_field_id( 'hour' ); ?>">Time</label>
		<input type="number" id="<?php echo $this->get_field_id( 'hour' ); ?>" name="<?php echo $this->get_field_name( 'hour' ); ?>" value="<?php echo esc_attr( $instance['hour'] ); ?>" min="0" max="12"> :
		<input type="number" id="<?php echo $this->get_field_id( 'minute' ); ?>" name="<?php echo $this->get_field_name( 'minute' ); ?>" value="<?php echo esc_attr( $instance['minute'] ); ?>" min="0" max="59">
		<select id="<?php echo $this->get_field_id( 'meridiem' ); ?>" name="<?php echo $this->get_field_name( 'meridiem' ); ?>">
			<option value="AM">AM</option>
			<option value="PM"<?php if ( $instance['meridiem'] === 'PM' ): ?> selected<?php endif; ?>>PM</option>
		</select><br>
		<label for="<?php echo $this->get_field_id( 'day' ); ?>">Date</label>
		<input type="number" id="<?php echo $this->get_field_id( 'day' ); ?>" name="<?php echo $this->get_field_name( 'day' ); ?>" value="<?php echo esc_attr( $instance['day'] ); ?>" min="1" max="31">
		<select id="<?php echo $this->get_field_id( 'month' ); ?>" name="<?php echo $this->get_field_name( 'month' ); ?>" value="<?php echo esc_attr( $instance['month'] ); ?>">
		<?php for ($i = 0; $i < count( self::MONTHS ); $i++): ?>
			<option value="<?php echo $i; ?>"<?php if ( intval( $instance['month'] ) === $i ): ?> selected<?php endif; ?>><?php echo self::MONTHS[$i]['name']; ?></option>
		<?php endfor; ?>
		</select>
		<input type="number" id="<?php echo $this->get_field_id( 'year' ); ?>" name="<?php echo $this->get_field_name( 'year' ); ?>" min="<?php echo date( 'Y' ); ?>" value="<?php echo esc_attr( $instance['year'] ); ?>"><br>
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '' );
		$instance['hour'] = ( intval( $new_instance['hour'] ) >= 0 && intval( $new_instance['hour'] ) <= 12 ? strip_tags( $new_instance['hour'] ) : '' );
		$instance['minute'] = ( intval( $new_instance['minute'] ) >= 0 && intval( $new_instance['minute'] ) <= 59 ? strip_tags( $new_instance['minute'] ) : '' );
		$instance['meridiem'] = ( ! empty( $new_instance['meridiem'] ) ? strip_tags( $new_instance['meridiem'] ) : '' );
		$instance['day'] = ( ! empty( $new_instance['day'] ) && self::dayCorrect( $new_instance ) ? strip_tags( $new_instance['day'] ) : '' );
		$instance['month'] = ( ! empty( $new_instance['month'] ) && ( intval( $new_instance['month'] ) >= intval( date( 'm' ) ) - 1 || intval( $new_instance['year'] ) > intval( date( 'Y' ) ) ) ? strip_tags( $new_instance['month'] ) : '' );
		$instance['year'] = ( ! empty( $new_instance['year'] ) && $new_instance['year'] >= intval( date( 'Y' ) ) ? strip_tags( $new_instance['year'] ) : '' );
		$instance['venue'] = ( ! empty( $new_instance['venue'] ) ? strip_tags( $new_instance['venue'] ) : '' );
		$instance['description'] = ( ! empty( $new_instance['description'] ) ? strip_tags( $new_instance['description'] ) : '' );
		$instance['event_url'] = ( ! empty( $new_instance['event_url'] ) ? strip_tags( $new_instance['event_url'] ) : '' );
		return $instance;
	}
	
	/**
	 * Utility method to check whether the date exceeds the number of days for the specified month and to make sure day is in the future.
	 *
	 * @access private
	 *
	 * @param $instance Widget settings.
	 * @return boolean True if day is fine, false if not.
	 */
	private function dayCorrect( $instance ) {
		$day = intval( $instance['day'] );

		// Handles day minimum value.
		if ( $day < 1 ) {
			return false;
		}

		// Handles day maximum value for February.
		if ( $instance['month'] === '1' ) {
			// Handles regular February.
			if ( intval( $instance['year'] ) % 4 !== 0 && $day > 28 ) {
				return false;
			}

			// Handles leap year February.
			if ( $day > 29 ) {
				return false;
			}
			
			return true;
		}

		// Handles day maximum value for all other months.
		if ( $day > self::MONTHS[$instance['month']]['days'] ) {
			return false;
		}
		
		// Check whether day is in the future.
		if ( intval( $instance['year'] ) > intval( date( 'Y' ) ) ) {
		//	return true;
		}
		
		if ( intval( $instance['month'] ) > intval( date( 'm' ) ) - 1 ) {
		//	return true;
		}
		
		if ( $day <= intval( date( 'd' ) ) ) {
			return false;
		}

		return true;
	}
}