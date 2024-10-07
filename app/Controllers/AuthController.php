<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        // Load the session service
        $this->session = \Config\Services::session();
    }

    public function register()
    {
        // Load the UserModel
        $userModel = new UserModel();

        // Get form input directly
        $userData = [
            "user_name" => $this->request->getPost("username"),
            "email" => $this->request->getPost("email"),
            "phone" => $this->request->getPost("phone"),
            "password" => password_hash(
                $this->request->getPost("password"),
                PASSWORD_DEFAULT
            ), // Hash the password
        ];

        // Insert data into the database (no validation)
        $userModel->insert($userData);

        // Check if any rows were affected
        if ($userModel->db->affectedRows() > 0) {

            $insertedUserId = $userModel->getInsertID();

        // Fetch the newly created user data
        $user = $userModel->find($insertedUserId);

        // Check if the user type is empty
        if (empty($user['user_type'])) {
            // Store user_id temporarily in session to use for updating user_type later
            session()->set('user_id', $user['user_id']);

            // Redirect to the 'choose user type' view
            return redirect()->to('/choose_user_type');
        }
        
            // On success, redirect to the public login page
            return redirect()
                ->to("/business_home")
                ->with("success", "Registration successful! Please login.");
        } else {
            // On failure, return an error message
            return redirect()
                ->back()
                ->with("error", "Registration failed. Please try again.");
        }
    }

    // Handle login logic for both email and phone
    public function loginProcess()
    {
        // Get request data
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        // Load the UserModel
        $userModel = new UserModel();

        // Login via email and password
        if (!empty($email) && !empty($password)) {
            $user = $userModel->where("email", $email)->first();

            if ($user) {
                if (password_verify($password, $user["password"])) {
                    // Check if user_type is set
                    if (empty($user['user_type'])) {
                        // Store user_id temporarily in session to use for updating user_type later
                        session()->set('user_id', $user['user_id']);

                        // Redirect to the 'choose user type' view
                        return redirect()->to('/choose_user_type');
                    }

                    // Successful login, set session
                    $this->setUserSession($user);
                    return redirect()->to("/business_home")->with("success", "Login successful");
                } else {
                    return redirect()->back()->with("error", "Incorrect password");
                }
            } else {
                return redirect()->back()->with("error", "User not found");
            }
        }
    }



    // Set user session data after login
    private function setUserSession($user)
    {
        $data = [
            "user_id" => $user["user_id"],
            "username" => $user["user_name"],
            "email" => $user["email"],
            "phone" => $user["phone"],
            "isLoggedIn" => true,
        ];

        $this->session->set($data);
        return true;
    }

    public function validateOtp()
    {
        $otp = $this->request->getPost("otp");
        $phone = $this->request->getPost("phone");

        // Check if the entered OTP is correct (in this case, 1234)
        if ($otp == "1234") {
            // Simulate fetching user data based on the phone number
            $userData = [
                "user_id" => 1, // Simulated user ID
                "phone" => $phone,
                "name" => "Guest User",
            ];

            // Store user data in session
            $this->session->set("user_data", $userData);

            // Set success flash message
            $this->session->setFlashdata(
                "success",
                "Login successful via OTP!"
            );

            // Redirect to the dashboard or home page
            return redirect()->to("/business_home");
        } else {
            // Set error flash message
            return redirect()
                ->back()
                ->with("error", "Invalid OTP. Please try again.");
        }
    }

    public function login()
    {
        // Your login logic here
    }

    public function logout()
    {
        // Destroy the session
        $this->session->destroy();

        // Redirect to customer login page
        return redirect()
            ->to("/customer_login")
            ->with("info", "You have been logged out.");
    }
}
