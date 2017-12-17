<?php

/**
 * Gets the Google client ID for the theme.
 *
 * @since 0.9 
 *
 * @return The Google client ID for the theme.
 */
function ecologie_get_google_client_id() {
	return ecologie_get_theme_mod_or_default( 'contact_sc_gapi_clientid' );
}

/**
 * Prepare Google client to get SMTP details.
 *
 * @since 0.9
 *
 * @return The Google client.
 */
function ecologie_google_client() {
	$client = new Google_Client();
	$client->setClientId( ecologie_get_google_client_id() );
	$client->setClientSecret( ecologie_get_theme_mod_or_default( 'contact_sc_gapi_client_secret' ) );
	$client->setScopes( 'https://mail.google.com/' );
	$client->setRedirectUri( admin_url( 'customize.php?action=google_auth_grant' ) );
	$client->setAccessType( 'offline' );
	
	if ( isset( $_GET['code'] ) ) {
		$token = $client->fetchAccessTokenWithAuthCode( $_GET['code'] );
	}
	
	return $client;
}

/**
 * Gets access token.
 *
 * @since 0.9
 * @uses ecologie_google_client()
 *
 * @return Google access token.
 */
function ecologie_get_access_token() {
	$client = ecologie_google_client();
	$access_token = get_theme_mod( 'contact_sc_gapi_access_token' );var_dump($access_token);
	if ( ! $access_token ) {
		return array( 'authorization_uri' => $client->createAuthUrl() );
	}
	
	$client->setAccessToken( $access_token );
	
	// Refresh token, if expired.
	if ( $client->isAccessTokenExpired() ) {
		$client->refreshToken( $client->getRefreshToken() );
		$new_access_token = $client->getAccessToken();var_dump($new_access_token);
		set_theme_mod( 'contact_sc_gapi_access_token', json_encode( $new_access_token ) );
		return json_decode( $new_access_token, true );
	}
	
	return json_decode( $access_token, true );
}

// In case admin wants to use Google API, authenticate with it.
if ( ecologie_get_theme_mod_or_default( 'contact_sc_conn_method' ) === 'google_auth' && ! empty( $_GET['code'] ) ) {
	add_action( 'admin_init', 'ecologie_google_auth' );
	add_action( 'admin_init', 'ecologie_get_access_token' );
}

function ecologie_google_auth() {
	$client = ecologie_google_client();
	$access_token = $client->authenticate( $_GET['code'] );var_dump($access_token);
	
	if ( ! empty( $access_token ) ) {
		set_theme_mod( 'contact_sc_gapi_access_token', json_encode( $access_token ) );
	}
}

/**
 * Sends email using Google API.
 *
 * @since 0.9
 * @uses ecologie_google_client()
 */
function ecologie_send_email_via_gapi() {
	$message = new Google_Service_Gmail_Message();
	
}