<?php require 'includes/menus/bottom-menu-walker.php'; ?>
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
					<div class="col-xs-12 col-md-4">&copy; Copyright 2017. All rights reserved.</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>