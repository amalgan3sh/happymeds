<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class BusinessController extends Controller
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email && $password) {
            // Email and password login
            $user = $this->userModel->where('email', $email)->first();
            
            if ($user && password_verify($password, $user['password'])) {
                // Successful login
                $this->session->set('user_id', $user['user_id']);
                return redirect()->to('/business_home');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password.');
            }
        }

        return redirect()->back()->with('error', 'Please provide valid credentials.');
    }

    public function BusinessHome()
    {
        return view('business/business_home');
    }

    public function updateUserType()
    {
        // Get the current user ID from session or any relevant method
        $userId = session()->get('user_id');  // Assuming the user ID is stored in the session after login

        // Get the selected user type from the form submission
        $userType = $this->request->getPost('user_type');

        if ($userId && $userType) {
            // Load the UserModel
            $userModel = new UserModel();

            // Update the user_type for this specific user
            $userModel->update($userId, ['user_type' => $userType]);

            // Redirect to the desired page with success message
            return redirect()->to('/business_home')->with('success', 'User type updated successfully!');
        } else {
            // Handle the case where the user type was not selected or the user is not logged in
            return redirect()->back()->with('error', 'Please select a user type.');
        }
    }

    public function chooseUserType()
    {
        // Get the user ID from session or request
        $userId = session()->get('user_id'); // Assuming user_id is stored in session after login

        if ($this->request->getMethod() === 'post') {
            // Get the selected user type from the form submission
            $userType = $this->request->getPost('user_type');

            // Ensure the userType is valid
            $validTypes = ['Agent', 'Agency', 'Manufacturer', 'Distributor', 'Supplier', 'Franchise'];
            if (!in_array($userType, $validTypes)) {
                return redirect()->back()->with('error', 'Invalid user type selected.');
            }

            // Update the user_type field for the specific user
            $userModel = new UserModel();
            
            // Only update the user_type for the specific user
            $userModel->update($userId, [
                'user_type' => $userType
            ]);

            // Redirect to the business home page with success message
            return redirect()->to('/business_home')->with('success', 'User type updated successfully.');
        }

        // Load the view with the user type selection form
        return view('public/choose_user_type'); // Adjust as needed
    }
}