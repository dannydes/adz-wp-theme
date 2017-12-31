<?php

/**
 * Changes the excerpt length.
 *
 * @param int $length Current excerpt length.
 * @return int New excerpt length.
 */
function ecologie_custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'ecologie_custom_excerpt_length', 999 );

/**
 * Renders a post excerpt's "Read more" button.
 *
 * @return string The "Read more" button.
 */
function ecologie_excerpt_more() {
	return '<a class="btn btn-default" href="' .
		esc_url( get_permalink( get_the_ID() ) ) .
		'">' . __( 'Read more...', 'ecologie' ) .
		'</a>';
}

add_filter( 'excerpt_more', 'ecologie_excerpt_more' );

/**
 * Alternative pagination function that outputs Bootstrap pagination from http://fellowtuts.com/wordpress/bootstrap-3-pagination-in-wordpress/.
 *
 * @param object $wp_query The query object.
 * @param int $range The range of page numbers to display on the sides.
 */
function ecologie_pagination( $wp_query, $range = 4 ) {  
	$showitems = ( $range * 2 ) + 1;

	global $paged;

	if( empty( $paged ) ) {
		$paged = 1;
	}

	$pages = $wp_query->max_num_pages;

	if( ! $pages ) {
		$pages = 1;
	}

	if( 1 != $pages ) {
		echo '<div class="text-center">'; 
		echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';

		if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
			echo "<li><a href='" . get_pagenum_link( 1 ) . "' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo "<li><a href='" . get_pagenum_link( $paged - 1 ) . "' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
		}
		
		for ( $i=1; $i <= $pages; $i++ ) {
			if ( 1 != $pages &&( ! ( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				echo ($paged == $i) ? "<li class=\"active\"><span>" . $i . " <span class=\"sr-only\">(current)</span></span></li>" : "<li><a href='" . get_pagenum_link( $i ) . "'>" . $i . "</a></li>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo "<li><a href=\"" . get_pagenum_link( $paged + 1 ) . "\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";
		}

		if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) {
			echo "<li><a href='" . get_pagenum_link( $pages ) . "' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
		}

		echo "</ul></nav>";
		echo "</div>";
	}
}

/**
 * Alternative featured image function that picks the first image in a post for posts without a featured image.
 */
function ecologie_featured_image() {
	if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>" class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</a>
	<?php else:
		$imgs = get_attached_media( 'image' );
		
		if ( count( $imgs ) ): ?>
			<a href="<?php the_permalink(); ?>" class="thumbnail">
				<img src="<?php echo wp_get_attachment_image_url( reset( $imgs )->ID, array( 200, 300 ) ); ?>">
			</a>
	<?php
		endif;
	endif;
}