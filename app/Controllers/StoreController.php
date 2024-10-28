<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\ProductModel;
use App\Models\CustomerVerificationModel;
use App\Models\B2BOrderModel;


class StoreController extends Controller
{
    public function EcommerceHome()
    {
        // Load the ecommerce_header and ecommerce_home views
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        $data['topSellingProducts'] = $productModel
            ->orderBy('sold_units', 'DESC')
            ->limit(3)
            ->findAll();
        
        $data['trendingProducts'] = $productModel
            ->orderBy('rating', 'DESC')  // or use 'sold_units' or any other criteria for trending
            ->limit(3)
            ->findAll();

        $data['recentlyAddedProducts'] = $productModel
            ->orderBy('created_at', 'DESC') // Order by most recent
            ->limit(3)
            ->findAll(); 

        $data['topRatedProducts'] = $productModel
            ->orderBy('rating', 'DESC') // Order by highest rating
            ->limit(3)
            ->findAll();
            

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_home',$data);
        echo view('ecommerce/ecommerce_footer');
    }


    public function ShopCart()
    {
        $session = session();
        $userId = $session->get('user_id');
        $cart = $session->get('cart') ?? [];

        // Calculate the total amount
        $totalAmount = array_sum(array_map(fn($item) => '10' * $item['quantity'], $cart));

        // Fetch KYC status from CustomerVerificationModel
        $verificationModel = new CustomerVerificationModel();
        $kycStatus = $verificationModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();

        $data = [
            'cartItems' => $cart,
            'totalAmount' => $totalAmount,
            'kycStatus' => $kycStatus ? $kycStatus['status'] : null,
        ];
        

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/shop_cart',$data);
        echo view('ecommerce/ecommerce_footer');
    }

    public function ShopEcommerce()
    {
        // Initialize the ProductModel
        $productModel = new ProductModel();

        // Retrieve all products or apply any specific filters as needed
        $products = $productModel->findAll();

        // Prepare data array to pass to the view
        $data = [
            'products' => $products
        ];

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/shop_ecommerce',$data);
        echo view('ecommerce/ecommerce_footer');
    }

    public function aboutEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/about');
        echo view('ecommerce/ecommerce_footer');
    }
    public function account()
    {
        $userModel = new UserModel();
        $userId = $session->get('user_id');
        $user = $userModel->find($userId);


        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/account',['user' => $user]);
        echo view('ecommerce/ecommerce_footer');
    }

  // In StoreController.php

  public function accountEcommerce()
  {
      $session = session();    
  
      if (!$session->has('user_id')) {
          return redirect()->to('/login')->with('error', 'Please log in to access your account.');
      }
      
      $userModel = new UserModel();
      $verificationModel = new CustomerVerificationModel();
      $userId = $session->get('user_id');
      
      // Get user data
      $user = $userModel->find($userId);

      $orderModel = new B2BOrderModel();
      $orders = $orderModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll();

        // Fetch user data
        $user = $userModel->find($userId);
      
      // Get verification status
      $verification = $verificationModel->where('user_id', $userId)
                                        ->orderBy('created_at', 'DESC')
                                        ->first();
      
      // Set kycStatus based on the latest verification status
      $kycStatus = $verification ? $verification['status'] : 'none';
  
      $data = [
          'user' => $user,
          'kycStatus' => $kycStatus,  // Pass the kycStatus to the view
          'verification' => $verification,
          'orders' => $orders
      ];
  
      echo view('ecommerce/ecommerce_header');
      echo view('ecommerce/account', $data);
      echo view('ecommerce/ecommerce_footer');
  }

    public function submitVerificationForm()
    {
        $session = session();
        $userId = $session->get('user_id');
        $model = new CustomerVerificationModel();

        $existingVerification = $model->where('user_id', $userId)->first();

        if ($existingVerification) {
            if ($existingVerification['status'] === 'success') {
                return redirect()->back()->with('info', 'Your KYC verification has already been approved.');
            } elseif ($existingVerification['status'] === 'pending') {
                return redirect()->back()->withInput()->with('pendingVerification', true);
            }
        }

        return $this->processFormSubmission($userId);
    }

    private function processFormSubmission($userId)
    {
        $data = [
            'user_id' => $userId,
            'full_name' => $this->request->getPost('full_name'),
            'dob' => $this->request->getPost('dob'),
            'nationality' => $this->request->getPost('nationality'),
            'drug_license_number' => $this->request->getPost('drug_license_number'),
            'medical_license_number' => $this->request->getPost('medical_license_number'),
            'business_address' => $this->request->getPost('business_address'),
            'contact_number' => $this->request->getPost('contact_number'),
            'official_email' => $this->request->getPost('official_email'),
            'tax_identification_number' => $this->request->getPost('tax_identification_number'),
            'pan_card_number' => $this->request->getPost('pan_card_number'),
            'handling_certification' => $this->request->getPost('handling_certification'),
            'gmp_compliance' => $this->request->getPost('gmp_compliance'),
            'status' => 'pending'
        ];

        $model = new CustomerVerificationModel();
        $model->insert($data);

        return redirect()->to('/account')->with('success', 'Your KYC verification form has been submitted successfully.');
    }
    public function resubmitVerification()
    {
        $session = session();
        $userId = $session->get('user_id');
    
        $model = new CustomerVerificationModel();
    
        // Update existing pending verification
        $model->where('user_id', $userId)
              ->where('status', 'pending')
              ->delete();  // Delete the old pending verification
    
        // Insert new verification data
        $data = [
            'user_id' => $userId,
            'full_name' => $this->request->getPost('full_name'),
            'dob' => $this->request->getPost('dob'),
            'nationality' => $this->request->getPost('nationality'),
            'drug_license_number' => $this->request->getPost('drug_license_number'),
            'medical_license_number' => $this->request->getPost('medical_license_number'),
            'business_address' => $this->request->getPost('business_address'),
            'contact_number' => $this->request->getPost('contact_number'),
            'official_email' => $this->request->getPost('official_email'),
            'tax_identification_number' => $this->request->getPost('tax_identification_number'),
            'pan_card_number' => $this->request->getPost('pan_card_number'),
            'handling_certification' => $this->request->getPost('handling_certification'),
            'gmp_compliance' => $this->request->getPost('gmp_compliance'),
            'status' => 'pending'
        ];
    
        $model->insert($data);
    
        // Return JSON response
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Verification details updated successfully'
        ]);
    }

    public function contacttEcommerce()
    {
        echo view('ecommerce/contact');
    }
    public function login()
    {
        // echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/login');
        // echo view('ecommerce/ecommerce_footer');
    }

    public function authenticate_user()
    {
        $session = session();
        
        $emailOrUsername = $this->request->getPost('emailOrUsername');
        $password = $this->request->getPost('password');
        $rememberMe = $this->request->getPost('remember_me');
        
        $userModel = new UserModel();
        $user = $userModel->where('email', $emailOrUsername)
                         ->orWhere('user_name', $emailOrUsername)
                         ->first();
    
        if ($user) {
            if (password_verify($password, $user['password']) && $user['user_type'] === 'b2b_partner') {
                $sessionData = [
                    'user_id' => $user['user_id'],
                    'username' => $user['user_name'],
                    'email' => $user['email'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
    
                if ($rememberMe) {
                    $this->response->setCookie('remember_token', 
                        $user['id'], 
                        time() + (86400 * 30)
                    );
                }
    
                return redirect()->to('ecommerce_home')
                                ->with('success', 'Login successful!');
            } else {
                $errorMessage = password_verify($password, $user['password']) 
                    ? 'Access denied. Only B2B partners can log in.' 
                    : 'Invalid password';
                return redirect()->back()
                                ->with('error', $errorMessage)
                                ->withInput();
            }
        } else {
            // User not found, set a flashdata for modal display
            $session->setFlashdata('not_registered', true);
            return redirect()->back()->withInput();
        }
    }

    // Optional: Logout function
    public function logout()
    {
        helper('cookie');
        $session = session();
        $session->destroy();
        
        // Remove remember me cookie if exists
        if (get_cookie('remember_token')) {
            delete_cookie('remember_token');
        }

        return redirect()->to('login')
                        ->with('success', 'Successfully logged out');
    }

    public function customer_register()
    {
        echo view('ecommerce/customer_register');
    }

    public function SaveData()
    {
        // Start session
        $session = session();

        // Get form data
        $userData = [
            'user_name' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password for security
            'user_type' => 'b2b_partner',
            'created_date' => date('Y-m-d H:i:s')
        ];

        // Save data to database
        $userModel = new UserModel();
        $userId = $userModel->insert($userData);

        // Store user ID in session
        $session->set('user_id', $userId);

        // Redirect to ecommerce_home
        return redirect()->to('/ecommerce_home')->with('success', 'Registration successful. Welcome to our store!');
    }

    public function KidsMedicineEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/kids_medicine');
        echo view('ecommerce/ecommerce_footer');
    }

    public function AdultMedicine()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/adult_medicine');
        echo view('ecommerce/ecommerce_footer');
    }
}