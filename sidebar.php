<div id="sidebar" class="sidebar">
	<button id="sidebar-toggle" class="btn btn-default sidebar-toggle" type="button">Toggle sidebar</button>
<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>
</div>