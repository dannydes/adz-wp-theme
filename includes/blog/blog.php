<?php

/**
 * Makes AddThis script non-blocking.
 *
 * @param string $tag <script> markup.
 * @param string $handle Script handle.
 * @return string <script> markup.
 */

function ecologie_addthis_add_async( $tag, $handle ) {
	if ( 'addthis' !== $handle ) {
		return $tag;
	}
	
	return str_replace( ' src', ' async="async" src', $tag );
}

add_filter( 'script_loader_tag', 'ecologie_addthis_add_async', 10, 2 );


/**
 * Changes the excerpt length.
 *
 * @param integer $length Current excerpt length.
 * @return integer New excerpt length.
 */
function ecologie_custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'ecologie_custom_excerpt_length', 999 );

/**
 * Renders a post excerpt's "Read more" button.
 * @return string The "Read more" button.
 */
function ecologie_excerpt_more() {
	return '<a class="btn btn-default" href="' .
		esc_url( get_permalink( get_the_ID() ) ) .
		'">' . __( 'Read more...', 'ecologie' ) .
		'</a>';
}

add_filter( 'excerpt_more', 'ecologie_excerpt_more' );