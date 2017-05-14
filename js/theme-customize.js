(function ( $ ) {
	
	'use strict';
	
	wp.customize( 'cta_block_text', function ( value ) {
		value.bind(function ( newVal ) {
			$( '.call-to-action-block p' ).html( newVal );
		});
	});
	
	wp.customize( 'cta_block_btn_text', function ( value ) {
		value.bind(function ( newVal ) {
			$( '.call-to-action-block a' ).html( newVal );
		});
	});
	
	wp.customize( 'cta_block_btn_url', function ( value ) {
		value.bind(function ( newVal ) {
			$( '.call-to-action-block a' ).attr( 'href', newVal );
		});
	});
	
	wp.customize( 'copyright_text_addition', function ( value ) {
		value.bind(function ( newval ) {
			$( '#copyright-extra-text' ).html( newval );
		});
	});
	
	wp.customize( 'recent_posts', function ( value ) {
		value.bind(function ( newVal ) {
			$.post( ecologie.ajax_url, {
				'action': 'recent_posts',
				'data': value,
			}, function ( res ) {
				$( '#recent-posts' ).html( res );
			});
		});
	});
	
	wp.customize( 'header_image_text', function ( value ) {
		value.bind(function ( newVal ) {
			$( '.header p' ).html( newVal );
		});
	});
	
	wp.customize( 'header_image_manifesto', function ( value ) {
		value.bind(function ( newVal ) {
			$( '.header a' ).attr( 'href', newVal );
		});
	});
	
})( jQuery );