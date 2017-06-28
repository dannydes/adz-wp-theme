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
					createAlert( 'success', 'Email sent successfully!' );
					$( '#contact-us input, #contact-message' ).val( '' );
				} else {
					createAlert( 'warning', 'Email failed!' );
				}
			} );
		}
		return false;
	});
	
	function createAlert(type, text) {
		var alertDiv = document.createElement( 'div' );
		$( alertDiv ).addClass( 'alert alert-' + type + ' alert-dismissible fade in' );
		$( alertDiv ).attr( 'role', 'alert' );
		var a = document.createElement( 'a' );
		$( a ).attr( 'href', '#' );
		$( a ).addClass( 'close' );
		$( a ).attr( 'data-dismiss', 'alert' );
		$( a ).attr( 'aria-label', 'close' );
		$( a ).html( 'x' );
		alertDiv.appendChild( a );
		var strong = document.createElement( 'strong' );
		$( strong ).html( text );
		alertDiv.appendChild( strong );
		$( '#contact-us' ).prepend( alertDiv );
	}
})( jQuery );