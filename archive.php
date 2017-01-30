<?php

get_header();

get_sidebar();

?>
<div class="page-header">
	<h1><?php the_archive_title(); ?></h1>
	<p><?php the_archive_description(); ?></p>
</div>
<?php

get_template_part( 'includes/blog/posts-list' );

get_footer();