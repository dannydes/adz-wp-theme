<?php

/*
Theme Name: ADZ
Author: Daniel Desira
Author URI: http://dannydes.github.io
Description: The theme built for ADZ following the branding of the European Green Party.
Version: 0.1
*/

get_header();

if ( have_posts() ) {
	//while ( have_posts() ) {
		the_post();
		?><div class="page-header">
			<h1><?php the_title(); ?></h1>
		</div><?php
		the_content();
	//}
}

get_footer();