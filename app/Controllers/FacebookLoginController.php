<?php

namespace App\Controllers;

use League\OAuth2\Client\Provider\Facebook;

class FacebookLoginController extends BaseController
{
    protected $clientID;
    protected $clientSecret;
    protected $redirectUri;

    public function __construct()
    {
        // Use environment variables for Facebook OAuth credentials
        $this->clientID = getenv('FACEBOOK_APP_ID');
        $this->clientSecret = getenv('FACEBOOK_APP_SECRET');
        $this->redirectUri = getenv('FACEBOOK_REDIRECT_URI');
    }

    public function login()
    {
        $provider = new Facebook([
            'clientId'        => $this->clientID,
            'clientSecret'    => $this->clientSecret,
            'redirectUri'     => $this->redirectUri,
            'graphApiVersion' => 'v10.0',
        ]);

        // Get the authorization URL and redirect to Facebook
        $authUrl = $provider->getAuthorizationUrl();
        session()->set('oauth2state', $provider->getState());

        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $provider = new Facebook([
            'clientId'        => $this->clientID,
            'clientSecret'    => $this->clientSecret,
            'redirectUri'     => $this->redirectUri,
            'graphApiVersion' => 'v10.0',
        ]);

        // Validate state parameter to prevent CSRF
        if ($this->request->getVar('state') !== session()->get('oauth2state')) {
            session()->remove('oauth2state');
            return redirect()->to('/login')->with('error', 'Invalid Facebook login state.');
        }

        // Try to get an access token
        try {
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $this->request->getVar('code')
            ]);

            // Get the resource owner (user details)
            $user = $provider->getResourceOwner($token);

            // Extract user data
            $userData = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'profile_picture' => $user->getPictureUrl()
            ];

            // Store user data in session
            session()->set('user_data', $userData);

            // Redirect the user to a protected page (like a dashboard)
            return redirect()->to('/dashboard');

        } catch (\Exception $e) {
            return redirect()->to('/login')->with('error', 'Failed to sign in with Facebook.');
        }
    }
}