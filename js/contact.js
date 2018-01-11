(function ( $, window ) {
	'use strict';
	
	$( '#contact-us' ).submit(function () {
		$( '#contact-sending-message' ).addClass( 'fa-spinner fa-spin' );
		
		$.post( ecologie.ajax_url, $( this ).serialize() + '&action=contact_us', function ( res ) {
			$( '#contact-sending-message' ).removeClass( 'fa-spinner fa-spin' );
			
			// Parse output to get last line.
			var lines = res.split( '\n' );
			var status = lines[lines.length - 1];
			
			if ( status === '1' ) {
				Ecologie.createAlert( '#contact-us', 'success', 'Email sent successfully!' );
				$( '#contact-us input:not([type=hidden]), #contact-message' ).val( '' );
			} else {
				Ecologie.createAlert( '#contact-us', 'warning', status );
			}
		} ).fail( function () {
			$( '#contact-sending-message' ).removeClass( 'fa-spinner fa-spin' );
			Ecologie.createAlert( '#contact-us', 'danger', 'Internal error. Please try later or contact site administrator.' );
		} );
				
		// Reset reCAPTCHA for reuse.
		grecaptcha.reset();
		
		return false;
	});
	
	// Callback for Google hidden reCAPTCHA.
	window.submitContactForm = function () {
		$( '#contact-us' ).submit();
	}
})( jQuery, window );