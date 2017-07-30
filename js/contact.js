(function ( $ ) {
	'use strict';
	
	var clientId = '260323786335-qeqqbp3bd8l81d50lhtv68s6khm0f948.apps.googleusercontent.com';
	var apiKey = 'AIzaSyAKEhlNQid8LbMwXc5HmGN1gRIYefM-Pnk';
	var scopes = 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send';
	
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