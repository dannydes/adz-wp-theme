<?php

get_header();

get_sidebar();

?>
<div class="page-header">
	<h1><?php single_post_title(); ?></h1>
</div>
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

	$big = 999999999;
	
?>
<nav aria-label="Page navigation">
  <ul class="pagination">
	<?php
	
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'current' => $paged,
		'total' => $the_query->max_num_pages,
		'type' => 'list',
	) );
	
	?>
	</ul>
</nav>
<?php

else:
	get_template_part( 'includes/blog/no-posts' );
endif;

get_footer();