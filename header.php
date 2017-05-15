<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]; ?>" alt="Brand">
						<?php echo get_bloginfo(); ?>
					</a>
					<p class="navbar-text hidden-md hidden-sm hidden-xs"><?php echo get_bloginfo( 'description' ); ?></p>
				</div>
				<div class="collapse navbar-collapse" id="main-menu">
					<?php
						
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class' => 'nav navbar-nav navbar-right',
							'walker' => new Ecologie_Primary_Nav_Menu_Walker(),
						) );
						
						$defaults = ecologie_get_default_options();
						
					?>
				</div>
			</div>
		</nav>
		<noscript>
			<div class="alert alert-warning">Your JavaScript is disabled - this might hurt your experience. Please follow these <a href="http://www.enable-javascript.com/" target="_blank">steps</a>.</div>
		</noscript>
		<?php if ( get_theme_mod( 'header_on', $defaults['header_on'] ) ): ?>
		<header class="header" style="background-image:url('<?php header_image(); ?>');max-height:<?php echo get_custom_header()->height; ?>px;max-width:<?php echo get_custom_header()->width; ?>px">
			<?php if ( get_theme_mod( 'header_image_text_on', $defaults['header_image_text_on'] ) ): ?>
			<div class="header-text">
				<h1><?php echo bloginfo(); ?></h1>
				<h3><?php echo get_bloginfo( 'description' ); ?></h3>
				<hr>
				<p><?php echo get_theme_mod( 'header_image_text', $defaults['header_image_text'] ); ?></p>
				<a class="btn btn-success" role="button" href="<?php echo get_theme_mod( 'header_image_manifesto', $defaults['header_image_manifesto'] ); ?>" target="_blank">Our party's manifesto</a>
			</div>
			<?php endif; ?>
		</header>
		<?php endif; ?>
		<div class="container">
			