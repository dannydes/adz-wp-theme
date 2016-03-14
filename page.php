<?php

get_header();

get_sidebar();

the_post();

$page_ancestors = get_post_ancestors( get_the_ID() );

if ( ! empty( $page_ancestors ) ):
?>
<ol class="breadcrumb">
	<?php foreach ( $page_ancestors as $page_id ): ?>
	<li><a href="<?php the_permalink( $page_id ); ?>"><?php echo esc_html( get_the_title( $page_id ) ); ?></a></li>
	<?php endforeach; ?>
	<li class="active"><?php the_title(); ?></li>
</ol>
<?php endif; ?>
<div class="page-header">
	<h1><?php the_title(); ?></h1>
</div>
<?php

$page_children = get_pages( 'child_of=' . get_the_ID() );

if ( count( $page_children ) ): ?>
<div class="btn-group-vertical form-group" role="group" aria-label="...">
	<?php foreach ( $page_children as $page_id ): ?>
	<a class="btn btn-default" href="<?php echo the_permalink( $page_id ); ?>" role="button"><?php echo esc_html( get_the_title( $page_id ) ); ?></a>
	<?php endforeach; ?>
</div>
<?php endif;

the_content();

get_footer();