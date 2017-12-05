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
 * Authenticates with Google.
 *
 * @since 0.9
 *
 */
function ecologie_google_auth() {
	$client = new Google_Client();
	$client->setClientId( ecologie_get_google_client_id() );
	$client->setClientSecret( ecologie_get_theme_mod_or_default( 'contact_sc_gapi_client_secret' ) );
	$client->addScope( Google_Service_Gmail::GMAIL_SEND );
	$client->setRedirectUri( admin_url( 'customize.php?action=google_auth_grant' ) );
	if ( isset( $_GET['code'] ) ) {
		$token = $client->fetchAccessTokenWithAuthCode( $_GET['code'] );
	}
	
	$service = new Google_Service_Gmail( $client );
	$user = 'me';
	/*$results = $service->users_labels->listUsersLabels($user);

	if (count($results->getLabels()) == 0) {
		print "No labels found.\n";
	} else {
		print "Labels:\n";
		foreach ($results->getLabels() as $label) {
			printf("- %s\n", $label->getName());
		}
	}*/
}

// In case admin wants to use Google API, authenticate with it.
if ( ecologie_get_theme_mod_or_default( 'contact_sc_conn_method' ) === 'google_auth' ) {
	add_action( 'admin_init', 'ecologie_google_auth' );
}