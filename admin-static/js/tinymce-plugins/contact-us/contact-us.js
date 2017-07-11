( function () {
	'use strict';
	
	tinymce.PluginManager.add( 'contact_us', function ( editor, url ) {
		editor.addButton( 'contact_us', {
			tooltip: 'Contact Us',
			title: 'Contact Us',
			cmd: 'contact_us',
			icon: 'contact-us',
			image: url + '/icon.svg'
		} );
		
		editor.addCommand( 'contact_us', function () {
			editor.windowManager.open({
				title: 'Contact Us',
				body: [
					{
						type: 'textbox',
						name: 'at',
						label: 'Your email'
					},
					{
						type: 'textbox',
						name: 'atName',
						label: 'Your name'
					}
				],
				onsubmit: function ( e ) {
					if ( e.data.at === '' ) {
						editor.windowManager.alert( '"Your email" cannot be left empty!' );
					} else {
						editor.insertContent( '[contact-us at="' + e.data.at + '" at-name="' + e.data.atName + '"]' );
					}
				}
			});
		} );
	} );
} )();