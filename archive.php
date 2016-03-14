<?php

get_header();

get_sidebar();

?>
<div class="page-header">
	<h1><?php the_archive_title(); ?></h1>
	<p><?php the_archive_description(); ?></p>
</div>
<?php if ( have_posts() ): ?>
<div class="row">
<?php

	while ( have_posts() ) {
		the_post();
		get_template_part( 'includes/post-excerpt-part' );
	}

?>
</div>
<?php

	the_posts_pagination( array(
		'mid_size' => 2,
	) );

else:
	get_template_part( 'includes/no-posts' );
endif;

get_footer();