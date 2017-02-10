(function ( $ ) {
	
	'use strict';
	
	wp.customize( 'add_this_enabled', function ( value ) {
		value.bind(function ( newVal ) {
			if ( newVal ) {
				$( '.addthis_native_toolbox' ).show();
			} else {
				$( '.addthis_native_toolbox' ).hide();
			}
		});
	});
	
	wp.customize( 'copyright_text_addition', function ( value ) {
		value.bind(function ( newval ) {
			$( '#copyright-extra-text' ).html( newval );
		});
	});
	
})( jQuery );