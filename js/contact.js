(function ( $ ) {
	'use strict';
	
	$( '#contact-us' ).submit(function () {
		if ( $( '#contact-hidden' ).val() !== '' ) {
			return false;
		}
		
		if ( $( '#contact-name' ).val() !== '' && $( '#contact-email' ).val() !== '' && $( '#contact-message' ).val() !== '' ) {
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
				
				if ( lines[lines.length - 1] === '1' ) {
					$( '#contact-success' ).css( 'display', 'block' ).addClass( 'in' );
					$( '#contact-us input, #contact-message' ).val( '' );
				} else {
					$( '#contact-failure' ).css( 'display', 'block' ).addClass( 'in' );
				}
			} );
		}
		return false;
	});
	
	$( '.alert' ).on( 'closed.bs.alert', function () {
		$( this ).removeClass( 'in' );
		$( this ).css( 'display', 'none' );
	});
})( jQuery );