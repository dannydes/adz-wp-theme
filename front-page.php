<?php

get_header();

get_sidebar();

the_post();

the_content();

?>
</div>
<div class="call-to-action-block">
	<div class="container">
		<p><?php echo get_theme_mod_or_default( 'cta_block_text' ); ?></p>
		<a href="<?php echo get_theme_mod_or_default( 'cta_block_btn_url' ); ?>" role="button" class="btn btn-success">
			<?php echo get_theme_mod_or_default( 'cta_block_btn_text' ); ?>
		</a>
	</div>
</div>
<div class="container">
	<div id="recent-posts"><?php get_template_part( 'includes/blog/recent-posts' ); ?></div>
<?php

get_footer();