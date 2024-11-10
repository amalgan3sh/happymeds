<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use CodeIgniter\Email\Email;


class AuthController extends Controller
{
    protected $session;
    protected $email;

    public function __construct()
    {
        // Load the session service
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();

    }

    public function forgotPassword() {
        // Get the user_id from the session
        $user_id = session()->get('user_id');

         // If no user_id is found in the session, return null
         if (!$user_id) {
            return null;
        }
    
        // Load the UserModel
        $userModel = new UserModel();

        // Fetch the user's information from the database
        $user = $userModel->where('user_id', $user_id)->first();

        // Pass the user's data to the views 
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/forgot_password', ['user' => $user]);
    
        return $header . $home;
    }

    public function send_reset_link()
    {
        $mail_id = $this->request->getPost('email');

        // Load the UserModel
        $userModel = new UserModel();
        
        // Load user model and check if email exists
        $user = $userModel->get_user_by_email($mail_id);
        
        if ($user) {
            // Generate token
            $token = bin2hex(random_bytes(50)); // Adjust length if needed
            $userModel->store_reset_token($user->user_id, $token);

            // Create reset link
            $reset_link = site_url('reset_password?token=' . $token);

            // Send email (you'll need to configure email settings)
            $recipientEmail = $mail_id;  

            $senderEmail = getenv('email.fromEmail');  // Ensure this is a valid email string
            $senderName = getenv('email.fromName'); 
            // $this->load->library('email');   
            $this->email->setTo($recipientEmail );
            $this->email->setFrom($senderEmail,$senderName);
            $this->email->setSubject('Password Reset Link');

            // $this->email->from('your_email@example.com', 'Your App Name');
            // $this->email->to($email);
            // $this->email->subject('Password Reset');
            $this->email->setMessage("Click here to reset your password: $reset_link");
            $this->email->send();

            if ($this->email->send()) {
                // echo "Please check your email for the password reset link.";
                return redirect()
                ->back()
                ->with("reset_link_success", "Please check your email for the password reset link.");
            } else {
                // echo "There was an error sending the reset link.";
                return redirect()
                ->back()
                ->with("reset_link_error", "There was an error sending the reset link.");
                // return $this->email->printDebugger(['headers']);

            }
        } else {
           // echo "There was an error sending the reset link.";
           return redirect()
           ->back()
           ->with("reset_link_error", "No account found with that email.");
           // return $this->email->printDebugger(['headers']);
        }
    }

    public function resetPassword(){
        // Check if token is valid  
        $token = $this->request->getGet('token');
        $userModel = new UserModel();
        $user = $userModel->get_user_by_token($token);

        if ($user) {
            $data['token'] = $token;
            // $header = view('business/business_header', ['user' => $user]);
            $home = view('business/reset_password', ['data' => $data ]);
            // $this->load->view('reset_password', $data);
            return $home;
        } else {
            return redirect()
           ->back()
           ->with("reset_password", "Invalid or expired token.");
            // echo "Invalid or expired token.";
        }
        
    }
    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');
        $userModel = new UserModel();
    
        // Validate token and passwords
        if ($password !== $confirm_password) {
            return redirect()
            ->back()
            ->with("update_password_error", "Passwords do not match.");
            // echo "Passwords do not match.";
            // return;
        }
    
        $user = $userModel->get_user_by_token($token);
    
        if ($user) {
            // Update password and clear token
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $userModel->update_password($user->user_id, $hashed_password);
            $userModel->clear_reset_token($user->user_id);
           

            echo "Password updated successfully.";
        } else {
            
            echo "Invalid or expired token.";
        }
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
                    // Store user_id in session
                    session()->set('user_id', $user['user_id']);
                    return redirect()->to("/business_home")->with("success", "Login successful");
                } else {
                    return redirect()->back()->with("error", "Incorrect password");
                }
            } else {
                return redirect()->back()->with("error", "User not found");
            }
        } else {
            return redirect()->back()->with("error", "Email and password are required");
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
            ->to("/");
    }
}
