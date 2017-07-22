var Ecologie = (function ( $ ) {
	'use strict';
	
	return {
		createAlert: function createAlert( parent, type, text, cssClass ) {
			var $alert = $( '<div>', {
				'class': 'alert alert-' + type + ' alert-dismissible fade in' + ( cssClass ? ' ' + cssClass : '' ),
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
			$( parent ).prepend( $alert );
		}
	}
})( jQuery );