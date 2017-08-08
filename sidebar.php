<?php if ( get_theme_mod_or_default( 'sidebar_on' ) ): ?>
<div id="sidebar" class="sidebar">
	<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	<div class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar' );	?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>