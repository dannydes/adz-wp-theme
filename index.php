<?php

get_header();

get_sidebar();

?>
<div class="page-header">
	<h1><?php single_post_title(); ?></h1>
</div>
<?php

get_template_part( 'includes/blog/posts-list' );

get_footer();