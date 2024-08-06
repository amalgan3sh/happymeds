<?php

namespace App\Controllers;

use App\Models\GoogleLoginModel;
use CodeIgniter\Controller;

class GoogleLogin extends Controller
{
    protected $googleLoginModel;

    public function __construct()
    {
        $this->googleLoginModel = new GoogleLoginModel();

    }

    public function loginProcess()
    {
        $id_token = $this->request->getPost('id_token');
        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');

        // Verify the ID token with Google
        $client = new \Google_Client(['client_id' => 'YOUR_CLIENT_ID.apps.googleusercontent.com']); 
        $payload = $client->verifyIdToken($id_token);
        if ($payload) {
            $userid = $payload['sub'];

            $current_datetime = date('Y-m-d H:i:s');

            // Check if the user is already registered
            if ($this->googleLoginModel->isAlreadyRegistered($userid)) {
                // Update user data
                $userData = [
                    'first_name' => $payload['given_name'],
                    'last_name' => $payload['family_name'],
                    'email_address' => $payload['email'],
                    'profile_picture' => $payload['picture'],
                    'updated_at' => $current_datetime
                ];

                $this->googleLoginModel->updateUserData($userData, $userid);
            } else {
                // Insert new user data
                $userData = [
                    'login_oauth_uid' => $userid,
                    'first_name' => $payload['given_name'],
                    'last_name' => $payload['family_name'],
                    'email_address' => $payload['email'],
                    'profile_picture' => $payload['picture'],
                    'created_at' => $current_datetime
                ];

                $this->googleLoginModel->insertUserData($userData);
            }

            // Set user data in session
            session()->set('user_data', $userData);
            return redirect()->to('/dashboard');
        } else {
            // Invalid ID token
            return redirect()->to('/brand_partner_registration')->with('error', 'Invalid ID token.');
        }
    }

    public function logout()
    {
        session()->remove('user_data');
        return redirect()->to('/google_login');
    }
}
