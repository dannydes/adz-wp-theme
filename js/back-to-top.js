(function ( $, window ) {
	'use strict';
	
	$( '#top' ).click( function ( e ) {
		e.preventDefault();
		$( 'html, body' ).animate( {
			scrollTop: 0
		}, 700 );
	} );
	
	$( window ).scroll( showHideButton );
	
	showHideButton();
	
	function showHideButton() {
		if ( $( window ).scrollTop() > 250 ) {
			$( '#top' ).addClass( 'show' );
		} else {
			$( '#top' ).removeClass( 'show' );
		}
	}
})( jQuery, window );