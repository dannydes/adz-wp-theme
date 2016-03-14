<?php

get_header();

?>
<div class="well">
	<h1>Page not found!</h1>
	<p>Please check the URL.</p>
	<p>If you're here by error, go back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage.</a></p>
	<a class="thumbnail" href="#">
		<img src="<?php echo get_template_directory_uri(); ?>/static/chopped tree.jpg" alt="picture of chopped tree">
	</a>
</div>
<?php

get_footer();