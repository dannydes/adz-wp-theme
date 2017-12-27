<?php

/**
 * Prepare Google client to get SMTP details.
 *
 * @since 0.9
 * @uses ecologie_get_access_token()
 *
 * @return The Google client.
 */
function ecologie_google_client() {
	$client = new Google_Client();
	$client->setClientId( ecologie_get_theme_mod_or_default( 'contact_sc_gapi_clientid' ) );
	$client->setClientSecret( ecologie_get_theme_mod_or_default( 'contact_sc_gapi_client_secret' ) );
	$client->setScopes( 'https://mail.google.com/' );
	$client->setRedirectUri( admin_url( 'customize.php?action=google_auth_grant' ) );
	$client->setAccessType( 'offline' );
	$client->setApprovalPrompt( 'force' );
	ecologie_get_access_token( $client );
	
	return $client;
}

/**
 * Gets access token.
 *
 * @since 0.9
 *
 * @param $client object Google_Client instance.
 * @return Google access token.
 */
function ecologie_get_access_token( $client ) {
	$access_token = get_theme_mod( 'contact_sc_gapi_access_token' );
	if ( ! $access_token ) {
		return array( 'authorization_uri' => $client->createAuthUrl() );
	}
	
	$client->setAccessToken( $access_token );
	
	// Refresh token, if expired.
	if ( $client->isAccessTokenExpired() ) {
		$client->refreshToken( get_theme_mod( 'contact_sc_gapi_refresh_token' ) );
		$new_access_token = $client->getAccessToken();
		set_theme_mod( 'contact_sc_gapi_access_token', json_encode( $new_access_token ) );
		return $new_access_token;
	}
	
	return json_decode( $access_token, true );
}

// In case admin wants to use Google API and this is a redirect from Google Authorisation screen, perform authentication.
if ( ecologie_get_theme_mod_or_default( 'contact_sc_conn_method' ) === 'google_auth' && ! empty( $_GET['code'] ) ) {
	add_action( 'admin_init', 'ecologie_google_auth' );
}

/**
 * Handles authentication with Google upon returning from the Google authentication/authorisation page.
 *
 * @since 0.9
 * @uses ecologie_google_client()
 */
function ecologie_google_auth() {
	$client = ecologie_google_client();
	$access_token = $client->authenticate( $_GET['code'] );
	
	if ( ! empty( $access_token ) ) {
		set_theme_mod( 'contact_sc_gapi_access_token', json_encode( $access_token ) );
		set_theme_mod( 'contact_sc_gapi_refresh_token', json_encode( $client->getRefreshToken() ) );
		
		// If access token is retrieved and stored successfully, redirect to prevent sending the same
		// authorisation code in case user reloads page.
		wp_redirect( admin_url( 'customize.php' ) );
	}
}

/**
 * Sends email using Google API.
 *
 * @since 0.9
 * @uses ecologie_google_client()
 *
 * @param $recipient string Recipient email address.
 * @param $sender string Sender email address.
 * @param $senderName string Sender name.
 * @param $subject string Email subject.
 * @param $body string Email body.
 * @param $wantCopy bool Whether user wants a copy.
 * @return Message success.
 */
function ecologie_send_email_via_gapi( $recipient, $sender, $senderName, $subject, $body, $wantCopy ) {
	$gmail = new Google_Service_Gmail( ecologie_google_client() );
	
	try {
		$message = new Google_Service_Gmail_Message();
		
		$mail = new PHPMailer();
		$mail->Charset = 'UTF-8';
		$mail->From = $sender;
		$mail->FromName = $senderName;
		$mail->AddAddress( $recipient );
		if ( $wantCopy ) {
			$mail->AddCC( $sender );
		}
		$mail->AddReplyTo( $sender, $senderName );
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->preSend();
		$mime = $mail->getSentMIMEMessage();
		
		$message->setRaw( str_replace( array( '+', '/', '=' ), array( '-', '_', '' ), base64_encode( $mime ) ) );
		$gmail->users_messages->send( 'me', $message );
		
		return true;
	} catch ( Exception $ex ) {
		return false;
	}
}