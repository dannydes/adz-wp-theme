<div class="sidebar">
<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>
	<p class="sidebar-info">Hover me.</p>
</div>