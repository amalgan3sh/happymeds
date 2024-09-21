<?php

namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;

class GoogleLoginController extends BaseController
{
    public function __construct()
    {
        $this->clientID = getenv('GOOGLE_CLIENT_ID');
        $this->clientSecret = getenv('GOOGLE_CLIENT_SECRET');
        $this->redirectUri = getenv('GOOGLE_REDIRECT_URL');
    }

    public function login()
    {
        $client = new Google_Client();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri('http://localhost:8888/happymeds/public_login');  // Make sure this matches
        $client->addScope("email");
        $client->addScope("profile");
    
        $loginUrl = $client->createAuthUrl();
        return redirect()->to($loginUrl);
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId($this->clientID);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($this->redirectUri);

        if ($this->request->getVar('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            $client->setAccessToken($token['access_token']);

            // Get user info
            $googleService = new Google_Service_Oauth2($client);
            $googleUser = $googleService->userinfo->get();

            // Save the user in your database if needed
            $userData = [
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'profile_picture' => $googleUser->picture
            ];

            // Store user data in session
            session()->set('user_data', $userData);

            return redirect()->to('/dashboard');  // Replace with your application's dashboard
        } else {
            return redirect()->to('/login');
        }
    }
}