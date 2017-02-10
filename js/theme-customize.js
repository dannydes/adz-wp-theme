(function ( $ ) {
	
	wp.customize( 'copyright_text_addition', function ( value ) {
		value.bind(function ( newval ) {
			$( '#copyright-extra-text' ).html( newval );
		});
	});
	
})( jQuery );