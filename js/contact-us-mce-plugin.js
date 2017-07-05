(function ( tinymce ) {
	'use strict';
	
	tinymce.PluginManager.add( 'contact-us', function ( editor, url ) {
		editor.addButton( 'contact-us', {
			text: 'Contact Us',
			icon: 'contact-us',
			onclick: function () {
				editor.windowManager.open({
					title: 'Contact Us',
					body: [
						{
							type: 'textbox',
							name: 'at',
							label: 'Email sent at'
						},
						{
							type: 'textbox',
							name: 'atName',
							label: 'Recepient name'
						}
					],
					onsubmit: function ( e ) {
						editor.insertContent( '[contact-us at="' + e.data.at + '" at-name="' + e.data.atName + '"]' );
					}
				});
			}
		} );
	});
})( tinymce );