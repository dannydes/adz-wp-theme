(function ( $ ) {
	'use strict';
	
	$( '#sidebar-button' ).click( toggleSidebar );
	
	function toggleSidebar() {
		var className = 'open';
		
		if ( $( '#sidebar' ).hasClass( className ) ) {
			$( '#sidebar' ).removeClass( className );
			$( this ).removeClass( 'active' );
		} else {
			$( '#sidebar' ).addClass( className );
			$( this ).addClass( 'active' );
		}
		
		return false;
	}
})( jQuery );