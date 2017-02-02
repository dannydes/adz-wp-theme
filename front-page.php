<?php

get_header();

get_sidebar();

the_post();

the_content();

$defaults = ecologie_get_default_options();

?>
</div>
<div class="call-to-action-block">
	<div class="container">
		<p><?php echo get_theme_mod( 'cta_block_text', $defaults['cta_block_text'] ); ?></p>
		<a href="<?php echo get_theme_mod( 'cta_block_btn_url', $defaults['cta_block_btn_url'] ); ?>" role="button" class="btn btn-success"><?php echo get_theme_mod( 'cta_block_btn_text', $defaults['cta_block_btn_text'] ); ?></a>
	</div>
</div>
<div class="container">
<?php

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

get_footer();