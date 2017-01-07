<div id="sidebar" class="sidebar">
	<button id="sidebar-lock" class="btn btn-default sidebar-lock" type="button">Lock sidebar</button>
	<div class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar' ) ): ?>
	
		<?php dynamic_sidebar( 'sidebar' ); ?>
	
	<?php endif; ?>
	<?php
		
		wp_list_bookmarks( array(
			'title_li' => 'Blogroll',
			'title_before' => '<h4>',
			'title_after' => '</h4>',
		) );
		
		?>
	</div>
</div>