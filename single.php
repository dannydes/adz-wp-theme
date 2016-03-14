<?php

get_header();

get_sidebar();

the_post();

?>
<div class="page-header">
	<h1><?php the_title(); ?></h1>
</div>
<small>Posted on <time><?php the_time( get_option( 'date_format' ) ); ?></time>.</small>
<?php if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ): ?>
	<a class="btn btn-default" href="<?php echo admin_url(); ?>post.php?post=<?php the_ID(); ?>&action=edit" role="button">Edit</a>
<?php endif; ?>
<p>Filed under: <?php the_category( ' ' ); ?></p>
<article <?php post_class(); ?>><?php the_content(); ?></article>
<div class="well">
	<h2>About the author: <?php the_author_link(); ?></h2>
	<div class="media">
		<div class="media-left">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
		</div>
		<div class="media-body">
			<p><?php the_author_description(); ?></p>
		</div>
	</div>
</div>
<nav>
	<ul class="pager">
		<li class="previous"><?php previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> %title' ); ?></li>
		<li class="next"><?php next_post_link( '%link', '%title <span aria-hidden="true">&rarr;</span>' ); ?></li>
	</ul>
</nav>
<?php

comments_template();

get_footer();