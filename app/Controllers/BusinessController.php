<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\ManufacturerProductModel;
use App\Models\SupportModel;
use App\Models\B2BOrderModel;
use App\Models\PurchaseOrderModel;
use App\Models\ProductModel;

class BusinessController extends Controller
{
    protected $session;
    protected $userModel;
    protected $supportModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->supportModel = new SupportModel();
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
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        // Load the ProductModel
        $productModel = new ProductModel();
        
        // Fetch all products
        $userId = $user['user_id'];
        $data['products'] = $productModel->where('manufacturer_id', $userId)->findAll();
        
        // Get the count of products
        $data['productCount'] = count($data['products']);
        
        // Load the B2BOrderModel
        $b2bOrderModel = new B2BOrderModel();
        
        // Count b2b_orders where manufacturer_id = user_id
        $data['b2bOrderCount'] = $b2bOrderModel->where('manufacturer_id', $userId)->countAllResults();
        
        // Load the PurchaseOrderModel
        $purchaseOrderModel = new PurchaseOrderModel();
        
        // Count purchase_orders where manufacturer_id = user_id
        $data['purchaseOrderCount'] = $purchaseOrderModel->where('manufacturer_id', $userId)->countAllResults();
        
        // Calculate total amount of purchase orders
        $data['totalPurchaseOrderAmount'] = $purchaseOrderModel->selectSum('total_amount')
            ->where('manufacturer_id', $userId)
            ->get()
            ->getRow()
            ->total_amount ?? 0;
            
        // Calculate total amount of product requirements
        $data['totalProductRequirementAmount'] = $b2bOrderModel->selectSum('total_amount')
            ->where('manufacturer_id', $userId)
            ->get()
            ->getRow()
            ->total_amount ?? 0;
        
        // Get total sales of products (sum of sold_units)
        $data['totalSales'] = $productModel->selectSum('sold_units')
            ->where('manufacturer_id', $userId)
            ->get()
            ->getRow()
            ->sold_units ?? 0;
    
        // Get top-selling products (if you want, you can modify this logic to pick the top N)
        $data['topSellingProducts'] = $productModel->where('manufacturer_id', $userId)
            ->orderBy('sold_units', 'desc')
            ->limit(5)
            ->findAll();
        
        // Get product categories count
        $data['categoryCount'] = $productModel->select('DosageForm')
            ->where('manufacturer_id', $userId)
            ->distinct()
            ->countAllResults();
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_home', [
            'user' => $user,
            'products' => $data['products'],
            'isKycVerified' => $isKycVerified,
            'b2bOrderCount' => $data['b2bOrderCount'],
            'purchaseOrderCount' => $data['purchaseOrderCount'],
            'totalPurchaseOrderAmount' => $data['totalPurchaseOrderAmount'],
            'totalProductRequirementAmount' => $data['totalProductRequirementAmount'],
            'totalSales' => $data['totalSales'],
            'topSellingProducts' => $data['topSellingProducts'],
            'categoryCount' => $data['categoryCount'],
        ]);
        
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

    public function supportRequest() {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        $userId = $user['user_id'];

        // Pass the user's data and KYC status to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/support_request', ['user' => $user]);

        return $header . $home;
    }

    public function submitSupportRequest()
    {

        // Get data from POST request
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $message = $this->request->getPost('message');

        // Prepare data for database insertion
        $data = [
            'name' => $name,
            'email' => $email, 
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->supportModel->insert($data)) {
            // Load the email library
            $email = \Config\Services::email();
            
            $email->setFrom($data['email'], $data['name']);
            $email->setTo('avsneha99@gmail.com'); // Replace with the support team's email address
            
            $email->setSubject('New Support Request');
            $email->setMessage("
                You have received a new support request. Here are the details:<br><br>
                <strong>Name:</strong> {$data['name']}<br>
                <strong>Email:</strong> {$data['email']}<br>
                <strong>Message:</strong> {$data['message']}
            ");
            
            if ($email->send()) {
                return redirect()->back()->with('success', 'Support request submitted and email sent successfully!');

                
            } else {
                return redirect()->back()->with('success', 'Support request submitted, but failed to send email.');
               
            }
        } else {
            return redirect()->back()->with('success', 'An error occurred while submitting your request.');
        }

        // return $this->response->setJSON($response);
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

    public function BusinessEditProduct()
    {
        $user = $this->authenticate();  
        $id = $this->request->getGet('id');

        $userId = $user['user_id'];

        $productModel = new ManufacturerProductModel();
        // Fetch products that belong to the logged-in user
        $product = $productModel->where('id',$id)->findAll();
        
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_edit_product', ['user' => $user, 'product'=>$product ]);
    
        return $header . $home;
    }

    public function BusinessManageProduct()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        $userId = $user['user_id'];

        $productModel = new ProductModel();
        // Fetch products that belong to the logged-in user
        $products = $productModel->where('manufacturer_id', $userId)->findAll();

        // Pass the user's data and products to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_manage_products', ['user' => $user, 'products' => $products]);

        // Return the combined views
        return $header . $home;
    }

    public function ManufaturerViewPurchaseOrder($order_id)
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        $userId = $user['user_id'];

        $order_id = $this->request->getGet('order_id'); // Retrieve the 'order_id' from GET parameters

        if (!$order_id) {
            return redirect()->back()->with('error', 'Order ID is missing.');
        }
    
        $orderModel = new PurchaseOrderModel();
        $order = $orderModel->find($order_id);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Pass the user's data and products to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/manufacturer/view_purchase_order', ['order' => $order]);

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

            // Now update the users table with kyc_status as 'in_process'
        $userModel = new \App\Models\UserModel();
        $user_data = [
            'kyc_verify' => 'in_process',  // or you can set any other status like 'pending', etc.
            'updated_at' => date('Y-m-d H:i:s')
        ];
        log_message('debug', 'Update data: ' . print_r($user_data, true));

       
        // $userModel->update($user['user_id'], $userData);
        $userModel->set($user_data)
              ->where('user_id', $user['user_id']) // Specify the condition
              ->update();

        // Redirect to a success page
        return redirect()->back()->with('message', 'KYC submitted successfully.');
    }

    public function updateStatus($orderId, $status)
    {
        $user = $this->authenticate();
    
        // Validate the status input
        if (!in_array($status, ['have', 'donthave'])) {
            return redirect()->to('/orders')->with('error', 'Invalid status selected.');
        }
    
        // Load the models
        $orderModel = new B2BOrderModel();
        $purchaseOrderModel = new PurchaseOrderModel();
    
        // Check if the order exists
        $order = $orderModel->find($orderId);
        if (!$order) {
            return redirect()->to('/business_requirements')->with('error', 'Order not found.');
        }
    
        // Manufacturer ID
        $manufacturerId = $user['user_id']; // Replace with logic to get the manufacturer ID
    
        if ($status === 'have') {
            // Check if the purchase order already exists
            $existingPurchaseOrder = $purchaseOrderModel
                ->where('order_id', $orderId)
                ->where('manufacturer_id', $manufacturerId)
                ->first();
    
            if ($existingPurchaseOrder) {
                return redirect()->to('/business_requirements')->with('error', 'This product is already moved to a purchase order.');
            }
    
            // Prepare data for the purchase order
            $purchaseOrderData = [
                'order_id' => $orderId,
                'customer_id' => $order['user_id'], // Changed to customer_id
                'manufacturer_id' => $manufacturerId,
                'product_details' => $order['order_items'], // Assuming this is in JSON format
                'total_amount' => $order['total_amount'],
            ];
    
            // Insert into purchase orders table
            $purchaseInserted = $purchaseOrderModel->insert($purchaseOrderData);
    
            if ($purchaseInserted) {
                // Update the order status to "Have It"
                $orderModel->update($orderId, ['status' => 'Have It']);
                return redirect()->to('/business_requirements')->with('success', 'Product moved to purchase order successfully.');
            } else {
                return redirect()->to('/business_requirements')->with('error', 'Failed to move product to purchase order.');
            }
        }
    
        if ($status === 'donthave') {
            // Check if there's an existing purchase order
            $existingPurchaseOrder = $purchaseOrderModel
                ->where('order_id', $orderId)
                ->where('manufacturer_id', $manufacturerId)
                ->first();
    
            if ($existingPurchaseOrder) {
                // Delete the purchase order
                $purchaseOrderModel
                    ->where('order_id', $orderId)
                    ->where('manufacturer_id', $manufacturerId)
                    ->delete();
            }
    
            // Update the order status to "Don't Have It"
            $updated = $orderModel->update($orderId, ['status' => "Don't Have It"]);
    
            if ($updated) {
                return redirect()->to('/business_requirements')->with('success', 'Order status updated and purchase order removed.');
            } else {
                return redirect()->to('/business_requirements')->with('error', 'Failed to update the order status.');
            }
        }
    
        return redirect()->to('/business_requirements')->with('error', 'Invalid action.');
    }

    public function BusinessOrders()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if authentication returned a redirect response
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response if authentication failed
        }
    
        $purchaseOrderModel = new PurchaseOrderModel();
        $manufacturerId = $user['user_id'];
    
        // Fetch all purchase orders
        $purchaseOrders = $manufacturerId 
            ? $purchaseOrderModel->where('manufacturer_id', $manufacturerId)->findAll()
            : [];
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_orders', ['user' => $user, 'purchaseOrders' => $purchaseOrders]);
    
        return $header . $home;
    }
    public function BusinessOrdersFinal()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if authentication returned a redirect response
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response if authentication failed
        }
    
        $purchaseOrderModel = new PurchaseOrderModel();
        $manufacturerId = $user['user_id'];
    
        // Fetch all purchase orders
        $purchaseOrders = $manufacturerId 
            ? $purchaseOrderModel->where('manufacturer_id', $manufacturerId)->findAll()
            : [];
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_orders_final', ['user' => $user, 'purchaseOrders' => $purchaseOrders]);
    
        return $header . $home;
    }
    public function BusinessRequirements()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        // Load the B2BOrderModel
        $b2bOrderModel = new \App\Models\B2BOrderModel();

        // Fetch all orders where manufacturer_id matches the logged-in user's user_id
        // and order the results by 'created_at' in descending order
        $orders = $b2bOrderModel
        ->select('b2b_orders.*, users.user_name') // Select orders fields and user_name
        ->join('users', 'users.user_id = b2b_orders.user_id') // Join users table on user_id
        ->where('b2b_orders.manufacturer_id', $user['user_id']) // Filter by manufacturer_id
        ->orderBy('b2b_orders.created_at', 'DESC') // Order by created_at descending
        ->findAll();
    
        // Pass the user's data to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_requirements', ['user' => $user,'orders' => $orders]);
    
        return $header . $home;
    }

    public function BusinessMessage()
    {
        $user = $this->authenticate(); // Assuming you have an authenticate method to get the logged-in user

        // Load the SupportModel
        $supportModel = new SupportModel();

        // Fetch all support requests for the logged-in user
        $supportRequests = $supportModel->where('user_id', $user['user_id'])->findAll();

        // Pass the user's data and the support requests to the view
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/business_message', [
            'user' => $user,
            'supportRequests' => $supportRequests,
        ]);

        return $header . $home;
    }
    public function submitRequest()
    {
        $user = $this->authenticate();
        // Initialize the model
        $supportModel = new SupportModel();

        try {
            // Prepare data for insertion with hardcoded values
            $data = [
                'name' => $user['user_name'],  // Hardcoded name
                'email' => $user['email'], // Hardcoded email
                'message' => $this->request->getPost('message'),
                'created_at' => date('Y-m-d H:i:s'),
                'user_id' => $user['user_id'],
                'status' => 'pending'
            ];

            // Insert the data
            $supportModel->insert($data);

            // Set success message and redirect
            return redirect()->back()
                ->with('success', 'Your message has been submitted successfully!');

        } catch (\Exception $e) {
            // Return with error message
            return redirect()->back()
                ->with('error', 'Error submitting message. Please try again.');
        }
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

    public function BusinessViewProfile()
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
        $home = view('business/business_view_profile', ['user' => $user]);
    
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
             // Define path to your image in WRITEPATH or FCPATH
            $imagePath = WRITEPATH . 'uploads/' . $imageName;

            // Copy to FCPATH if necessary to make it accessible
            $publicPath = ROOTPATH . 'uploads/user/' . $imageName;
            if (!file_exists($publicPath) && file_exists($imagePath)) {
                copy($imagePath, $publicPath);
            }
            // $profileImage->move(ROOTPATH . 'uploads/user/', $imageName);
            $data['profile_photo'] = $imageName; // Update the data array with the image path
        }
    
        // Update the user record
        if ($userModel->update($userId, $data)) {
            // Retrieve the user_type from the database
            $userType = $userModel->find($userId)['user_type'];

            // Redirect based on the user type
            if ($userType === 'agent') {
                return redirect()->to('/agent_home')->with('success', 'Profile updated successfully.');
            }

            // Default redirect if the user type is not 'agent'
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update the profile. Please try again.');
        }
    }

    public function updateProfilePicture() {
        $user = $this->authenticate();
        // Assume the user is authenticated and the user ID is stored in the session
        $userId = session()->get('user_id');
    
        if (!$userId) {
            return redirect()->back()->with('error', 'You must be logged in to update your profile.');
        }
    
        $userModel = new UserModel();
        $data = [];

         // Handle profile image upload
         $profileImage = $this->request->getFile('profile_picture');
         if ($profileImage && $profileImage->isValid()) {
             $imageName = $profileImage->getRandomName();
             $profileImage->move(ROOTPATH . 'uploads/user/', $imageName);
             $data['profile_photo'] = $imageName; // Update the data array with the image path
         }
     
         // Update the user record
         if ($userModel->update($userId, $data)) {
              return redirect()->back()->with('success', 'Profile picture updated successfully.');
         } else {
              return redirect()->back()->with('error', 'Failed to update the profile picture. Please try again.');
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