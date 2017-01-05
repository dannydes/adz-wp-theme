(function ( $ ) {
	'use strict';
	
	$( '#sidebar-lock' ).click( toggleSidebar );
	
	function toggleSidebar() {
		var className = 'sidebar-locked';
		
		if ( $( '#sidebar' ).hasClass( className ) ) {
			$( '#sidebar' ).removeClass( className );
			$( '#sidebar-lock' ).removeClass( 'active' );
		} else {
			$( '#sidebar' ).addClass( className );
			$( '#sidebar-lock' ).addClass( 'active' );
		}
	}
})( jQuery );