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
				var status = lines[lines.length - 1];
				
				if ( status === '1' ) {
					createAlert( 'success', 'Email sent successfully!' );
					$( '#contact-us input, #contact-message' ).val( '' );
				} else {
					createAlert( 'warning', status );
				}
			} );
		} else {
			createAlert( 'warning', 'Please provide your name, your email and your message.' );
		}
		
		return false;
	});
	
	function createAlert( type, text ) {
		var $alert = $( '<div>', {
			'class': 'alert alert-' + type + ' alert-dismissible fade in',
			'role': 'alert'
		} );
		var $button = $( '<button>', {
			'type': 'button',
			'class': 'close',
			'data-dismiss': 'alert',
			'aria-label': 'close'
		} );
		var $closeSignHolder = $( '<span>', {
			'aria-hidden': 'true'
		} );
		$closeSignHolder.html( '&times;' );
		$button.append( $closeSignHolder );
		$alert.append( $button );
		var $strong = $( '<strong>' );
		$strong.html( text );
		$alert.append( $strong );
		$( '#contact-us' ).prepend( $alert );
	}
})( jQuery );