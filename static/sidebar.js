(function ( $ ) {
	'use strict';
	
	$( '#sidebar-toggle' ).click( toggleSidebar );
	
	function toggleSidebar() {
		var className = 'sidebar-open';
		
		if ( $( '#sidebar' ).hasClass( className ) ) {
			$( '#sidebar' ).removeClass( className );
			$( '#sidebar-toggle' ).removeClass( 'active' );
		} else {
			$( '#sidebar' ).addClass( className );
			$( '#sidebar-toggle' ).addClass( 'active' );
		}
	}
})( jQuery );