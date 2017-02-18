<?php

if ( ! isset( $defaults ) ) {
	$defaults = ecologie_get_default_options();
}

$query = new WP_Query( 'posts_per_page=' . get_theme_mod( 'recent_posts', $defaults['recent_posts'] ) );

?>
	<h2>Recent News</h2>
<?php if ( $query->have_posts() ): ?>
	<div class="row">
<?php

	while ( $query->have_posts() ) {
		$query->the_post();
		get_template_part( 'includes/blog/post-excerpt-part' );
	}

?>
	</div>
<?php

else:
	get_template_part( 'includes/blog/no-posts' );
endif;

wp_reset_postdata();