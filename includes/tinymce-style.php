<?php

/**
 * Registers custom TinyMCE style.
 */
function ecologie_add_editor_style() {
	add_editor_style( 'admin-static/css/editor-style.css' );
}

add_action( 'after_setup_theme', 'ecologie_add_editor_style' );