<div class="col-md-6 col-xs-12">
	<div class="well">
		<?php if ( has_post_thumbnail() ): ?>
		<a href="<?php the_permalink(); ?>" class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</a>
		<?php endif; ?>
		<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
		<?php echo the_excerpt(); ?>
	</div>
</div>