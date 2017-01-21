<?php

get_header();

get_sidebar();

the_post();

the_content();

?>
</div>
<div class="call-to-action-block">
	<div class="container">
		<p>endgfsl.sdfl</p>
		<a href="#" role="button" class="btn btn-success">Join us</a>
	</div>
</div>
<div class="container">
<?php

$query = new WP_Query( 'posts_per_page=5' );

if ( $query->have_posts() ): ?>
	<h2>Recent News</h2>
	<div class="row">
<?php

	while ( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'includes/blog/post-excerpt-part' );
	}

?>
	</div>
<?php

endif;

wp_reset_postdata();

get_footer();