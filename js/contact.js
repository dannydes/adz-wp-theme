(function ( $ ) {
	'use strict';
	
	$( '#contact-us' ).submit(function () {
		
		$( '#contact-sending-message' ).addClass( 'fa-spinner fa-spin' );
		
		$.post( ecologie.ajax_url, $( this ).serialize() + '&action=contact_us', function ( res ) {
			$( '#contact-sending-message' ).removeClass( 'fa-spinner fa-spin' );
			
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
		
		return false;
	});
})( jQuery );