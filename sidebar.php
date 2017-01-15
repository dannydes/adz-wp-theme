<div id="sidebar" class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	<div class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar' );	?>
	</div>
	<?php endif; ?>
</div>