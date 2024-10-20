<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\ManufacturerProductModel;

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
                // Successful login: set session data
                $this->session->set([
                    'user_id' => $user['user_id'],
                    'user_name' => $user['user_name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'user_type' => $user['user_type'],
                    'kyc_verify' => $user['kyc_verify']
                ]);

                // Redirect to business home
                return redirect()->to('/business_home');
            } else {
                // Invalid login attempt
                return redirect()->back()->with('error', 'Invalid email or password.');
            }
        }

        // If no credentials are provided
        return redirect()->back()->with('error', 'Please provide valid credentials.');
    }

    public function BusinessHome()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
    
        // Load the ProductModel
        $model = new ManufacturerProductModel();
    
        // Fetch all products
        $data['products'] = $model->findAll();
        
        // Pass the user's data and products to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_home', ['user' => $user, 'products' => $data['products']]);
        
        return $header . $home;
    }

    public function BusinessVerification()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        $userId = $user['user_id'];

        // Load the KYC Verification Model
        $model = new \App\Models\KycVerificationModel();

        // Check if the KYC verification has already been submitted by the user
        $kycExists = $model->where('user_id', $userId)->first();

        // Pass the user's data and KYC status to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_verification', [
            'user' => $user,
            'kycExists' => $kycExists
        ]);

        return $header . $home;
    }

    public function delete_kyc()
    {
        $user = $this->authenticate();
        // Get the user ID from the request
        $request = $this->request->getJSON();
        $userId = $request->user_id;

        // Load the KYC Verification Model
        $model = new \App\Models\KycVerificationModel();

        // Attempt to delete the KYC record
        if ($model->where('user_id', $userId)->delete()) {
            // Return a JSON response indicating success
            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('business_verification')
            ]);
        } else {
            // Return a JSON response indicating failure
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function BusinessListProducts()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_list_products', ['user' => $user]);
    
        return $header . $home;
    }
    public function BusinessAddProduct()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_add_product', ['user' => $user]);
    
        return $header . $home;
    }

    public function BusinessManageProduct()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        $userId = $user['user_id'];

        $productModel = new ManufacturerProductModel();
        // Fetch products that belong to the logged-in user
        $products = $productModel->where('user_id', $userId)->findAll();

        // Pass the user's data and products to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_manage_products', ['user' => $user, 'products' => $products]);

        // Return the combined views
        return $header . $home;
    }

    public function submit_verification()
    {
        $user = $this->authenticate();

        // Process file uploads
        $identityProof = $this->request->getFile('identityProof');
        $addressProof = $this->request->getFile('addressProof');
        $bankStatement = $this->request->getFile('bankStatement');

        $uploadPath = ROOTPATH . 'documents/';

        // Move files to the documents folder
        $identityProofName = $identityProof->getRandomName();
        $identityProof->move($uploadPath, $identityProofName);

        $addressProofName = $addressProof->getRandomName();
        $addressProof->move($uploadPath, $addressProofName);

        // Optional file upload
        $bankStatementName = null;
        if ($bankStatement && $bankStatement->isValid()) {
            $bankStatementName = $bankStatement->getRandomName();
            $bankStatement->move($uploadPath, $bankStatementName);
        }

        // Prepare data for insertion
        $data = [
            'first_name' => $this->request->getPost('firstName'),
            'last_name' => $this->request->getPost('lastName'),
            'dob' => $this->request->getPost('dob'),
            'nationality' => $this->request->getPost('nationality'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'company_name' => $this->request->getPost('companyName'),
            'registration_number' => $this->request->getPost('registrationNumber'),
            'company_email' => $this->request->getPost('companyEmail'),
            'company_phone' => $this->request->getPost('companyPhone'),
            'website' => $this->request->getPost('website'),
            'bank_name' => $this->request->getPost('bankName'),
            'account_number' => $this->request->getPost('accountNumber'),
            'swift_code' => $this->request->getPost('swiftCode'),
            'tin' => $this->request->getPost('tin'),
            'vat_number' => $this->request->getPost('vatNumber'),
            'identity_proof' => $identityProofName,
            'address_proof' => $addressProofName,
            'bank_statement' => $bankStatementName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'user_id' => session()->get('user_id')
        ];

        // Insert data into the database
        $model = new \App\Models\KycVerificationModel();
        $model->insert($data);

        // Redirect to a success page
        return redirect()->to(base_url('business_verification'))->with('message', 'KYC submitted successfully.');
    }

    public function BusinessOrders()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_orders', ['user' => $user]);
    
        return $header . $home;
    }

    public function BusinessEditProfile()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        $userModel = new UserModel();
        $userId = $user['user_id'];
        $userData = $userModel->find($userId); // Fetch the user data from the database

        if (!$userData) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_edit_profile', ['user' => $user]);
    
        return $header . $home;
    }

    public function updateProfile()
    {
        $user = $this->authenticate();
        // Assume the user is authenticated and the user ID is stored in the session
        $userId = session()->get('user_id');
    
        if (!$userId) {
            return redirect()->back()->with('error', 'You must be logged in to update your profile.');
        }
    
        $userModel = new UserModel();
    
        // Collect the data from the form
        $data = [
            'firstname'      => $this->request->getPost('firstname'),
            'lastname'       => $this->request->getPost('lastname'),
            'user_name'      => $this->request->getPost('user_name'),
            'company_name'   => $this->request->getPost('company_name'),
            'designation'    => $this->request->getPost('designation'),
            'skills'         => $this->request->getPost('skills'),
            'gender'         => $this->request->getPost('gender'),
            'dob'            => $this->request->getPost('dob'),
            'phone'          => $this->request->getPost('phone'),
            'email'          => $this->request->getPost('email'),
            'country'        => $this->request->getPost('country'),
            'city'           => $this->request->getPost('city'),
            'about_me'       => $this->request->getPost('about_me'),
            'experience'     => $this->request->getPost('experience'),
            'language'       => $this->request->getPost('language'),
        ];
    
        // Handle profile image upload
        $profileImage = $this->request->getFile('profile_image');
        if ($profileImage && $profileImage->isValid()) {
            $imageName = $profileImage->getRandomName();
            $profileImage->move(WRITEPATH . 'uploads', $imageName);
            $data['profile_photo'] = $imageName; // Update the data array with the image path
        }
    
        // Update the user record
        if ($userModel->update($userId, $data)) {
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update the profile. Please try again.');
        }
    }
    
    /**
     * Public method to authenticate the user and get user data.
     * 
     * @return array The authenticated user data if successful.
     * @throws \CodeIgniter\HTTP\RedirectResponse Redirects to login if not authenticated.
     */
    public function authenticate()
    {
        // Get the user data from the session
        $user = $this->getAuthenticatedUser();
    
        // If no user is returned, redirect to the login page
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Please log in first')->send();
        }
    
        // Return the authenticated user data
        return $user;
    }
    
    /**
     * Private method to get the authenticated user.
     * 
     * @return array|null The user data if authenticated, otherwise null.
     */
    private function getAuthenticatedUser()
    {
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
    
        // Return the user data if found, otherwise null
        return $user ?: null;
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