<?php

function contact_us_shortcode( $atts ) {
	return ( empty( $atts['to'] ) ? '<p>Specify "to" attribute.</p>' : '' ) .
	'<form id="contact-us" action="#" method="post">
		<div class="form-group">
			<label for="contact-name">Your name</label>
			<input type="text" class="form-control" id="contact-name" name="name" placeholder="Your name">
		</div>
		<div class="form-group">
			<label for="contact-email">Your email</label>
			<input type="email" class="form-control" id="contact-email" name="email" placeholder="Your email">
		</div>
		<div class="form=group">
			<label for="contact-subject">Your subject</label>
			<input type="text" class="form-control" id="contact-subject" name="subject" placeholder="Your subject">
		</div>
		<div class="form-group">
			<label for="contact-message">Your message</label>
			<textarea class="form-control" id="contact-message" name="message" placeholder="Your message"></textarea>
		</div>
		<div class="form-group">
			<label for="contact-copy">Send me a copy <input type="checkbox"></label>
		</div>
		<input type="hidden" id="contact-hidden" name="hidden">
		<input type="hidden" id="contact-to" name="to" value="' . ( ! empty( $atts['to'] ) ? $atts['to'] : '' ) . '">
		<button type="submit" class="btn btn-default">Send message</button>
	</form>
	<div id="contact-success" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">Thanks for contact us!</h4>
				</div>
				<div class="modal-body">
					<p>Your message made it through!</p>
				</div>
			</div>
		</div>
	</div>
	<div id="failure" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Oops :(</h4>
				</div>
				<div class="modal-body">
					<p>Something went wrong.</p>
				</div>
			</div>
		</div>
	</div>';
}

add_shortcode( 'contact-us', 'contact_us_shortcode' );