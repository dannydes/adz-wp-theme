<?php

get_header();

get_sidebar();

?>
</div>
<div class="_404" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/coal-plant-404.jpg')">
	<div class="container">
		<div class="page-header">
			<h1>Page not found!</h1>
		</div>
		<p>Please check the URL.</p>
		<p>If you're here by error, go back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage.</a></p>
	</div>
</div>
<?php

get_footer();