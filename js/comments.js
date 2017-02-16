(function ( $ ) {
	'use strict';
	
	$( '#commentform' ).submit(function () {
		return $( '#comment' ).val() !== '' && $( '#author' ).val() !== '' && $( '#email' ).val() !== '';
	});
})( jQuery );