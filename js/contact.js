(function ( $ ) {
	'use strict';
	
	$( '#contact-us' ).submit(function () {
		if ( $( '#contact-hidden' ).val() !== '' ) {
			return false;
		}
		
		$.post( ecologie.ajax_url, {
			'action': 'contact_us',
			'name': $( '#contact-name' ).val(),
			'email': $( '#contact-email' ).val(),
			'subject': $( '#contact-subject' ).val(),
			'message': $( '#contact-message' ).val(),
			'forward-copy': $( '#contact-copy' ).is( ':checked' ),
			'at': $( '#contact-at' ).val(),
		}, function ( res ) {
			var lines = res.split( '\n' );
			var status = lines[lines.length - 1];
			
			if ( status === '1' ) {
				Ecologie.createAlert( '#contact-us', 'success', 'Email sent successfully!' );
				$( '#contact-us input, #contact-message' ).val( '' );
			} else {
				Ecologie.createAlert( '#contact-us', 'warning', status );
			}
		} );
		
		return false;
	});
})( jQuery );