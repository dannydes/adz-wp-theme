<?php

$paged = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );

$s = get_search_query();

$the_query = new WP_Query( array(
	'posts_per_page' => get_option( 'posts_per_page' ),
	'paged' => $paged,
	's' => ( empty( $s ) ? null : $s ),
	'post_type' => ( empty( $s ) ? 'post' : 'any' ),
) );

if ( $the_query->have_posts() ): ?>
<div class="row">
<?php

	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		get_template_part( 'includes/blog/post-excerpt-part' );
	}

?>
</div>
<?php

	ecologie_pagination( $the_query );
	
	wp_reset_postdata();

else:
	get_template_part( 'includes/blog/no-posts' );
endif;