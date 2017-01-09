(function ( $ ) {
	'use strict';
	
	$( '#sidebar-button' ).click( toggleSidebar );
	
	function toggleSidebar() {
		var className = 'open';
		
		if ( $( '#sidebar' ).hasClass( className ) ) {
			$( '#sidebar' ).removeClass( className );
			$( '#sidebar-button' ).removeClass( 'active' );
		} else {
			$( '#sidebar' ).addClass( className );
			$( '#sidebar-button' ).addClass( 'active' );
		}
	}
})( jQuery );