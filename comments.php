<div <?php comment_class(); ?>>
	<div class="well">
	<?php if ( have_comments() ): ?>
		<p><span class="label label-default"><?php echo get_comments_number(); ?> comments</span></p>
		<?php
		
		wp_list_comments( array(
			'avatar_size' => 40,
			'per_page' => get_option( 'comments_per_page' ),
			'short_ping' => TRUE,
			'style' => 'div',
		) );
		
		paginate_comments_links( array(
			'prev_text' => '←',
			'next_text' => '→',
		) );
		
		?>
	<?php endif; ?>
	<?php if ( ! comments_open() ): ?>
		<p><?php _e( 'Comments are closed.', 'ecologie' ); ?></p>
	<?php endif; ?>
	<?php

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$html_req = ( $req ? ' required aria-required="true"' : '' );
	
	$fields = array(
		'author' => '<div class="form-group comment-form-author">
				<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
				( $req ? '<span class="required label label-default">*</span>' : '' ) .
				'<input class="form-control" id="author" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $html_req . ' placeholder="Author" />
			</div>',
		'email' => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
				( $req ? '<span class="required label label-default">*</span>' : '' ) . ' (' . __( 'Will be kept anonymous.' ) . ')
				<input class="form-control" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $html_req . ' placeholder="Email" />
			</div>',
		'url' => '<div class="form-group comment-form-url">
				<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
				'<input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" placeholder="Website" />
			</div>',
	);

	comment_form( array(
		'comment_field' => '<div class="form-group comment-form-comment">
				<label for="comment">' . _x( 'Comment', 'noun' ) . ' <span class="required label label-default">*</span></label>
				<textarea class="form-control" id="comment" name="comment" rows="8" placeholder="Comment" required aria-required="true"></textarea>
			</div>',
		'class_submit' => 'btn btn-default submit',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'label_submit' => __( 'Send' ),
		'comment_notes_before' => '<p class="comment-notes"><span class="required label label-default">*</span> <strong>'. __( 'Asterisks denote required field.', 'ecologie' ) . '</strong></p>',
	) );

	?>
	</div>
</div>
