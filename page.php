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

the_content();

get_footer();