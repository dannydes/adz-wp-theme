jQuery( document ).ready(function ( $ ) {
	
	'use strict';
	
	$( '.wp-picker-container' ).iris({
		mode: 'hex',
		controls: {
			horiz: 's',
			vert: 's',
			strip: 's',
		},
		palettes: ['#81D742'],
	});
	
	$( '.wp-color-picker' ).wpColorPicker({
		change: function ( event, ui ) {
			var color = ui.color.toString();console.log(color);
			$( '.color-picker-hex' ).val( color );
		},
	});
	
});