		</div>
		<div class="alert alert-success alert-dismissible fade in container" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php _e( 'This site may store some non-confidential information about you. By continuing to use it, you agree to this.', 'ecologie' ); ?>
		</div>
		<footer class="footer">
			<div class="top">
				<div class="container row">
					<div class="col-xs-6 col-md-3">
					<?php if ( is_active_sidebar( 'footer-col-1' ) ): ?>
						<div class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-col-1' ); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-3">
					<?php if ( is_active_sidebar( 'footer-col-2' ) ): ?>
						<div class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-col-2' ); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-3">
					<?php if ( is_active_sidebar( 'footer-col-3' ) ): ?>
						<div class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-col-3' ); ?>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-3">
					<?php if ( is_active_sidebar( 'footer-col-4' ) ): ?>
						<div class="widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-col-4' ); ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="bottom">
				<div class="container row">
					<div class="col-xs-12 col-md-8">
						<nav>
						<?php
						
						wp_nav_menu( array(
							'theme_location' => 'bottom',
							'container' => '',
							'depth' => 1,
							'items_wrap' => '%3$s',
							'walker' => new Ecologie_Bottom_Nav_Menu_Walker(),
						) );
						
						?>
						</nav>
					</div>
					<div class="col-xs-12 col-md-4">
						&copy; 2016-<?php echo date( 'Y' ); ?>. <?php echo get_bloginfo(); ?> powered by 
						<a href="https://github.com/dannydes/ecologie" title="View on Github" target="_blank">Ecologie</a>. 
						Some rights reserved. <span id="copyright-extra-text"><?php echo get_theme_mod( 'copyright_text_addition', $GLOBALS['ecologie_default_options']['copyright_text_addition'] ); ?></span>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>