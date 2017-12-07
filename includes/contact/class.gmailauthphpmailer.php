<?php

/**
 * Extends the built-in PHPMailer class with Gmail Authentication functionality.
 *
 * @since 0.9
 */
class GmailAuthPHPMailer extends PHPMailer {
	/**
	 * Initiate a connection to the SMTP server.
	 * 
	 * @since 0.9
	 *
	 * @override
	 * @uses smtp
	 * @access public
	 * @throws phpmailerException
	 * @param array $options An array of options compatible with stream_context_create().
	 * @return bool Connection success.
	 */
	public function smtpConnect($options = array()) {
		return false;
	}
}