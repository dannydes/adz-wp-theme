<?php

get_header();

get_sidebar();

?>
<div class="page-header">
	<h1>Showing search results for <?php echo get_search_query(); ?></h1>
</div>
<div id="blog-posts"><?php get_template_part( 'includes/blog/posts-list' ); ?></div>
<?php

get_footer();