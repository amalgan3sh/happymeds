<?php

namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;

class GoogleLoginController extends BaseController
{
    protected $clientID;
    protected $clientSecret;
    protected $redirectUri;

    public function __construct()
    {
        // Use environment variables for Google OAuth credentials
        $this->clientID = getenv('GOOGLE_CLIENT_ID');
        $this->clientSecret = getenv('GOOGLE_CLIENT_SECRET');
        $this->redirectUri = getenv('GOOGLE_REDIRECT_URL');
    }

    public function login()
    {
        // Save the original URL to session before redirecting to Google login
        session()->set('original_url', previous_url());

        // Initialize Google Client
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);  // Use the value from environment variables
        $client->addScope("email");
        $client->addScope("profile");

        // Create Google login URL
        $loginUrl = $client->createAuthUrl();

        // Redirect user to the Google authentication page
        return redirect()->to($loginUrl);
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);
    
        if ($this->request->getVar('code')) {
            // Fetch token using the authorization code
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
    
            // Check if fetching the token failed
            if (isset($token['error'])) {
                // Redirect to login page with error
                return redirect()->to('/login')->with('error', 'Failed to authenticate with Google: ' . $token['error']);
            }
    
            // Set access token for the client
            $client->setAccessToken($token['access_token']);
    
            // Get user info from Google
            $googleService = new Google_Service_Oauth2($client);
            $googleUser = $googleService->userinfo->get();
    
            // User data to store
            $userData = [
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'profile_picture' => $googleUser->picture,
                'google_id' => $googleUser->id,
            ];
    
            // Store user data in session
            session()->set('user_data', $userData);
    
            // Redirect back to the original URL or a default page
            $originalUrl = session()->get('original_url');
            if ($originalUrl) {
                return redirect()->to($originalUrl);
            } else {
                // If no original URL, redirect to dashboard or homepage
                return redirect()->to('/dashboard');  // Update with your default dashboard URL
            }
        } else {
            // If code is not present, handle error
            return redirect()->to('/login')->with('error', 'Authorization code not found in the request.');
        }
    }
}