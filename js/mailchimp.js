(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));
(function ( $ ) {
	'use strict';
	
	$( '#mc-embedded-subscribe-form' ).submit(function () {console.log('hello');
		if ( $( '#mailchimp-name' ).val() === '' || $( '#mailchimp-surname' ).val() === '' || $( '#mailchimp-email' ).val() === '' ) {
			$( this ).append( '<p>Please fill in all fields!</p>' );
			return false;
		}
	});
})( jQuery );