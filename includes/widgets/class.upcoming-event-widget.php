<?php

/**
 * Upcoming event widget class.
 *
 * @extends WP_Widget
 */
class Ecologie_Upcoming_Event_Widget extends WP_Widget {
	/**
	 * Array holding months.
	 *
	 * @access private
	 */
	private const MONTHS = array(
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
	 * @uses self::dayOrdinalIndicator( array $instance )
	 *
	 * @param array $args Widget area args.
	 * @param array $instance Widget instance settings.
	 */
	public function widget( $args, $instance ) {
		?><h2 class="widgettitle"><?php echo esc_attr( $instance['title'] ); ?></h2>
		<?php echo intval( esc_attr( $instance['hour'] ) ) . ' : ' . ( intval( $instance['minute'] ) < 10 ? '0' : '' ) . ( $instance['minute'] !== '' ? intval( esc_attr( $instance['minute'] ) ) : '0' ) . ' ' . esc_attr( $instance['meridiem'] ); ?><br>
		<?php echo intval( esc_attr( $instance['day'] ) ) . self::dayOrdinalIndicator( $instance ); ?> <?php echo self::MONTHS[$instance['month']]['name'] ?> <?php echo intval( esc_attr( $instance['year'] ) ); ?><br>
		<?php echo esc_attr( $instance['venue'] ); ?>
		<p><?php echo esc_attr( $instance['description'] ); ?></p>
		<a href="<?php echo esc_url( $instance['event_url'] ); ?>" target="_blank" role="button" class="btn btn-default">More info...</a><?php
	}
	
	/**
	 * Renders widget settings form.
	 *
	 * @access public
	 *
	 * @param array $instance Widget instance settings.
	 */
	public function form( $instance ) {
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'hour' ); ?>">Hour (Time)</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['hour'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['hour']; ?>
			</span>
			<?php endif; ?>
			<input type="number" id="<?php echo $this->get_field_id( 'hour' ); ?>" name="<?php echo $this->get_field_name( 'hour' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['hour'] ); ?>" min="0" max="12">
			<label for="<?php echo $this->get_field_id( 'minute' ); ?>">Minute (Time)</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['minute'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['minute']; ?>
			</span>
			<?php endif; ?>
			<input type="number" id="<?php echo $this->get_field_id( 'minute' ); ?>" name="<?php echo $this->get_field_name( 'minute' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['minute'] ); ?>" min="0" max="59">
			<label for="<?php echo $this->get_field_id( 'meridiem' ); ?>">Meridiem (Time)</label>
			<select id="<?php echo $this->get_field_id( 'meridiem' ); ?>" name="<?php echo $this->get_field_name( 'meridiem' ); ?>">
				<option value="AM">AM</option>
				<option value="PM"<?php if ( $instance['meridiem'] === 'PM' ): ?> selected<?php endif; ?>>PM</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'day' ); ?>">Day (Date)</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['day'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['day']; ?>
			</span>
			<?php endif; ?>
			<input type="number" id="<?php echo $this->get_field_id( 'day' ); ?>" name="<?php echo $this->get_field_name( 'day' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['day'] ); ?>" min="1" max="31">
			<label for="<?php echo $this->get_field_id( 'month' ); ?>">Month (Date)</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['month'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['month']; ?>
			</span>
			<?php endif; ?>
			<select id="<?php echo $this->get_field_id( 'month' ); ?>" name="<?php echo $this->get_field_name( 'month' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['month'] ); ?>">
			<?php for ($i = 0; $i < count( self::MONTHS ); $i++): ?>
				<option value="<?php echo $i; ?>"<?php if ( intval( $instance['month'] ) === $i ): ?> selected<?php endif; ?>><?php echo self::MONTHS[$i]['name']; ?></option>
			<?php endfor; ?>
			</select>
			<label for="<?php echo $this->get_field_id( 'year' ); ?>">Year (Date)</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['year'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['year']; ?>
			</span>
			<?php endif; ?>
			<input type="number" id="<?php echo $this->get_field_id( 'year' ); ?>" name="<?php echo $this->get_field_name( 'year' ); ?>" class="widefat" min="<?php echo date( 'Y' ); ?>" value="<?php echo esc_attr( $instance['year'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'venue' ); ?>">Venue</label>
			<input type="text" id="<?php echo $this->get_field_id( 'venue' ); ?>" name="<?php echo $this->get_field_name( 'venue' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['venue'] ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">Description</label>
			<textarea id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" class="widefat" rows="10"><?php echo esc_attr( $instance['description'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'event_url' ); ?>">Event URL</label>
			<?php if ( ! empty( $instance['errors'] ) && ! empty( $instance['errors']['event_url'] ) ): ?>
			<span style="color:#f00">
				<?php echo $instance['errors']['event_url']; ?>
			</span>
			<?php endif; ?>
			<input type="url" id="<?php echo $this->get_field_id( 'event_url' ); ?>" name="<?php echo $this->get_field_name( 'event_url' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['event_url'] ); ?>">
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
	 * @return boolean FALSE when setting update is to be cancelled due to invalid data entry.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['errors'] = array();
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '' );
		
		if ( self::hourValid( $new_instance ) ) {
			$instance['hour'] = strip_tags( $new_instance['hour'] );
		} else {
			$instance['hour'] = $old_instance['hour'];
			$instance['errors']['hour'] = 'Hour invalid!';
		}
		
		if ( self::minuteValid( $new_instance ) ) {
			$instance['minute'] = strip_tags( $new_instance['minute'] );
		} else {
			$instance['minute'] = $old_instance['minute'];
			$instance['errors']['minute'] = 'Minute invalid!';
		}
		
		$instance['meridiem'] = ( ! empty( $new_instance['meridiem'] ) ? strip_tags( $new_instance['meridiem'] ) : '' );
		
		if ( self::dayMonthCorrect( $new_instance ) && self::dayInFuture( $new_instance ) ) {
			$instance['day'] = strip_tags( $new_instance['day'] );
		} else {
			$instance['day'] = $old_instance['day'];
			$instance['errors']['day'] = 'Day invalid!';
		}
		
		if ( intval( $new_instance['month'] ) >= intval( date( 'm' ) ) - 1 || intval( $new_instance['year'] ) > intval( date( 'Y' ) ) ) {
			$instance['month'] = strip_tags( $new_instance['month'] );
		} else {
			$instance['month'] = $old_instance['month'];
			$instance['errors']['month'] = 'Month invalid!';
		}
		
		if ( ! empty( $new_instance['year'] ) && $new_instance['year'] >= intval( date( 'Y' ) ) ) {
			$instance['year'] = strip_tags( $new_instance['year'] );
		} else {
			$instance['year'] = $old_instance['year'];
			$instance['errors']['year'] = 'Year invalid!';
		}
		
		$instance['venue'] = ( ! empty( $new_instance['venue'] ) ? strip_tags( $new_instance['venue'] ) : '' );
		$instance['description'] = ( ! empty( $new_instance['description'] ) ? strip_tags( $new_instance['description'] ) : '' );
		
		if ( ! empty( $new_instance['event_url'] ) && filter_var( $new_instance['event_url'], FILTER_VALIDATE_URL ) ) {
			$instance['event_url'] = strip_tags( $new_instance['event_url'] );
		} elseif ( ! empty( $new_instance['event_url'] ) ) {
			$instance['event_url'] = $old_instance['event_url'];
			$instance['errors']['event_url'] = 'URL invalid!';
		}
		
		return $instance;
	}
	
	/**
	 * Utility method to check whether the date exceeds the number of days for the specified month and to make sure day is in the future.
	 *
	 * @access private
	 *
	 * @param array $instance Widget instance settings.
	 * @return boolean True if day is fine, false if not.
	 */
	private function dayMonthCorrect( $instance ) {
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

		return true;
	}
	
	/**
	 * Utility method to make sure day is in the future.
	 *
	 * @access private
	 *
	 * @param array $instance Widget instance settings.
	 * @return boolean True if day is fine, false if not.
	 */
	private function dayInFuture( $instance ) {
		if ( intval( $instance['year'] ) > intval( date( 'Y' ) ) ) {
			return true;
		}
		
		if ( intval( $instance['month'] ) > intval( date( 'm' ) ) - 1 ) {
			return true;
		}
		
		if ( intval( $instance['day'] ) <= intval( date( 'd' ) ) ) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * Utility method to make sure minute is valid.
	 *
	 * @access private
	 *
	 * @since 0.9
	 *
	 * @param array $instance Widget instance settings.
	 * @return boolean True if minute is valid, false if not.
	 */
	private function minuteValid( $instance ) {
		$minute = intval( $instance['minute'] );
		
		if ( intval( $instance['hour'] ) === 12 && $minute !== 0 ) {
			return false;
		}
		
		return $minute >= 0 && $minute <= 59;
	}
	
	/**
	 * Utility method to make sure hour is valid.
	 *
	 * @access private
	 *
	 * @since 0.9
	 *
	 * @param array $instance Widget instance settings.
	 * @return boolean True if hour is valid, false if not.
	 */
	private function hourValid( $instance ) {
		$hour = intval( $instance['hour'] );
		
		return $hour >= 1 && $hour <= 12;
	}
	
	/**
	 * Utility method to return the ordinal indicator following day.
	 *
	 * @access private
	 *
	 * @since 0.9
	 *
	 * @param array $instance Widget instance settings.
	 * @return string The ordinal indicator following day.
	 */
	 private function dayOrdinalIndicator( $instance ) {
		 $day = intval( $instance['day'] );
		 $day_in_10 = floor( $day / 10 );
		 $day_in_10_rem = $day % 10;
		 
		 if ( $day_in_10 === 1.0 ) {
			 return 'th';
		 }
		 
		 if ( $day_in_10_rem === 1 ) {
			 return 'st';
		 } else if ( $day_in_10_rem === 2 ) {
			 return 'nd';
		 } else if ( $day_in_10_rem === 3 ) {
			 return 'rd';
		 }
		 
		 return 'th';
	 }
}