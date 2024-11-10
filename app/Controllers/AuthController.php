<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PartnerModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use CodeIgniter\Email\Email;
use App\Libraries\EmailService;


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

    // In app/Controllers/AuthController.php
public function passwordResetResponse()
{
    // Load a view to show the response message
    return view('business/password_reset_response');
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
            session()->setFlashdata('success', 'Password reset successful.');
        return redirect()->to('/password_reset_response');
            // return redirect()
            //     ->to("/password_reset")
            //     ->with("success", "Password updated successfully! Please login.");
            // echo "Password updated successfully.";
        } else {
            session()->setFlashdata('error', 'Password reset failed. Please try again.');
        return redirect()->to('/password_reset_response');
            // return redirect()
            //     ->to("/password_reset")
            //     ->with("success", "Invalid or expired token. Please login.");
            // echo "Invalid or expired token.";
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

    public function forgot_password_process() {
        $this->load->library('form_validation');
        
        // Validate email input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            // Show errors or redirect
            $this->load->view('forgot_password');
        } else {
            // Get email from POST
            $email = $this->input->post('email');
            
            // Check if the email exists in your database
            $user = $this->user_model->get_user_by_email($email);
            
            if ($user) {
                // Generate a unique reset token
                $token = bin2hex(random_bytes(50));  // You can also use a different approach for generating tokens
                
                // Store the token and associate it with the user
                $this->user_model->store_reset_token($email, $token);
                
                // Send reset email with a link containing the token
                $reset_link = base_url("reset_password?token=" . $token);
                $this->send_reset_email($email, $reset_link);
                
                // Redirect or show success message
                $this->session->set_flashdata('message', 'Password reset link has been sent to your email.');
                redirect('forgot_password');
            } else {
                // Handle error when email not found
                $this->session->set_flashdata('message', 'Email not found.');
                redirect('forgot_password');
            }
        }
    }

    public function send_reset_email($email, $reset_link) {
        $this->load->library('email');
        
        $this->email->from('your-email@example.com', 'Your Website Name');
        $this->email->to($email);
        $this->email->subject('Password Reset Request');
        
        $message = "Click on the following link to reset your password: <a href='" . $reset_link . "'>Reset Password</a>";
        
        $this->email->message($message);
        
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function reset_password_process() {
        $token = $this->input->post('token');
        $new_password = $this->input->post('new_password');
        
        // Validate token and check if it exists
        $user = $this->user_model->get_user_by_token($token);
        
        if ($user) {
            // Update the password in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $this->user_model->update_password($user['email'], $hashed_password);
            
            // Remove token from the database
            $this->user_model->remove_reset_token($token);
            
            $this->session->set_flashdata('message', 'Your password has been reset successfully.');
            redirect('login');
        } else {
            $this->session->set_flashdata('message', 'Invalid or expired token.');
            redirect('forgot_password');
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

    public function initPasswordReset()
    {
        try {
            $json = $this->request->getJSON();
            $email = $json->email ?? '';
            
            $userModel = new PartnerModel();
            $user = $userModel->where('email', $email)->first();
           
            if ($user) {
                // Generate OTP
                $otp = sprintf("%06d", random_int(0, 999999));
                // Store OTP in database
                $updateData = [
                    'reset_token' => $otp,
                    'reset_token_expires' => date('Y-m-d H:i:s', strtotime('+30 minutes'))
                ];    
                // Check if required data is available
                if (!empty($user['user_id']) && !empty($updateData['reset_token']) && !empty($updateData['reset_token_expires'])) {
                    // Store OTP in database
                    $userModel->update($user['user_id'], $updateData);
                } else {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to generate OTP. Please try again later.'
                    ]);
                }
                
                // Send email
                $emailService = \Config\Services::email();
                
                $emailService->setFrom('noreply@aranea.com', 'Aranea - Brand Partner Program');
                $emailService->setTo($user['email']);
                $emailService->setSubject('Password Reset OTP');
                
                $emailBody = "Hello " . ($user['name'] ?? 'User') . ",\n\n"
                . "Your OTP to reset your password is: " . $otp . "\n\n"
                . "This OTP is valid for 30 minutes.\n\n"
                . "If you didn't request this, please ignore this email.\n\n"
                . "Regards,\n"
                . "Aranea - Brand Partner Program";
                
                $emailService->setMessage($emailBody);
                
                if ($emailService->send()) {
                    return $this->response->setJSON([
                        'success' => true,
                        'message' => 'OTP has been sent to your email'
                    ]);
                } else {
                    log_message('error', 'Failed to send password reset email to ' . $user['email']);
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to send OTP. Please try again.'
                    ]);
                }
            }
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Email address not found'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in initPasswordReset: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.'
            ]);
        }
    }
    
    public function verifyOTPAndResetPassword()
    {
        $json = $this->request->getJSON();
        $email = $json->email ?? '';
        $otp = $json->otp ?? '';
        $newPassword = $json->new_password ?? '';
        
        $userModel = new UserModel();
        
        $user = $userModel->where([
            'email' => $email,
            'reset_token' => $otp,
            'reset_token_expires >' => date('Y-m-d H:i:s')
        ])->first();
        
        if ($user) {
            // Update password
            $userModel->update($user['user_id'], [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT),
                'reset_token' => null,
                'reset_token_expires' => null
            ]);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Password has been reset successfully'
            ]);
        }
        
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid or expired OTP'
        ]);
    }
}
