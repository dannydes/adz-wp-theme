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
		if ( is_null( $this->smtp ) ) {
			$this->smtp = $this->getSMTPInstance();
		}
		
		if ( $this->smtp->connected() ) {
			return true;
		}
		
		$this->smtp->setTimeout( $this->Timeout );
		$this->smtp->setDebugLevel( $this->SMTPDebug );
		$this->smtp->setDebugOutput( $this->DebugOutput );
		$this->smtp->setVerp( $this->do_verp );
		
		
		return false;
	}
}