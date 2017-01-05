<div id="sidebar" class="sidebar">
	<button id="sidebar-lock" class="btn btn-default sidebar-lock" type="button">Lock sidebar</button>
<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>
</div>