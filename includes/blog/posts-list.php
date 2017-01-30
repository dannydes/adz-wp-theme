<?php

$paged = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );

$the_query = new WP_Query( array(
	'posts_per_page' => 10,
	'paged' => $paged,
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

	ecologie_pagination();

else:
	get_template_part( 'includes/blog/no-posts' );
endif;