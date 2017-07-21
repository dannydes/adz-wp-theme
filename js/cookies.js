(function ( $ ) {
	'use strict';
	
	if ( ! localStorage.getItem( 'cookiesOk' ) ) {
		Ecologie.createAlert( '.footer', 'success', 'This site may store some non-confidential information about you. By continuing to use it, you agree to this.', 'container cookies' );
	}
	
	$( '.alert.cookies' ).on( 'closed.bs.alert', function () {
		localStorage.setItem( 'cookiesOk', true );
	} );
})( jQuery );