<?php
require 'vendor/google/auth/autoload.php'; // This includes the Google Client Library

function getGoogleClient() {
    $client = new Google\Client();
    
    // Set the Client ID and Client Secret you obtained from Google Cloud Console
    $client->setClientId('109908398316-4qh8o3a339uqtrrtr5ngmi90mtdocop1.apps.googleusercontent.com');
    $client->setClientSecret('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');

    // Set the redirect URI that Google will use after authentication
    $client->setRedirectUri('http://localhost/mstarztech.com/google_callback'); // Adjust this URL based on your environment

    // Add the scopes you need. For basic user info, use 'email' and 'profile'
    $client->addScope('email');
    $client->addScope('profile');

    // Optional: Set additional client options if needed (e.g., access type)
    $client->setAccessType('offline'); // 'offline' access gives you a refresh token

    return $client;
}
