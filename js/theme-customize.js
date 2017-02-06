(function ( $ ) {
	
	wp.customize( 'copyright_text_addition', function ( value ) {
		value.bind(function ( newval ) {$( '#sidebar' ).addClass( 'open' )
			$( '#copyright-extra-text' ).html( newval );
		});
	});
	
})( jQuery );