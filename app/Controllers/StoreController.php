<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\ProductModel;

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
        $cart = $session->get('cart') ?? [];
        
        
        // Calculate the total amount
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += '10' * $item['quantity'];
        }
    
        // Pass cart items and total to the view
        $data = [
            'cartItems' => $cart,
            'totalAmount' => $totalAmount
        ];
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/shop_cart');
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
        echo json_encode($user);
        die();

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/account',['user' => $user]);
        echo view('ecommerce/ecommerce_footer');
    }

    public function accountEcommerce()
    {
        $session = session();

        // Check if user is logged in
        if (!$session->has('user_id')) {
            return redirect()->to('/login')->with('error', 'Please log in to access your account.');
        }
        
        $userModel = new UserModel();
        $userId = $session->get('user_id');
        $user = $userModel->find($userId);

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/account',['user' => $user]);
        echo view('ecommerce/ecommerce_footer');
    }

    public function contacttEcommerce()
    {
        echo view('ecommerce/contact');
    }
    public function login()
    {
        session()->destroy();
        // echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/login');
        // echo view('ecommerce/ecommerce_footer');
    }

    public function authenticate_user()
    {
        // Clear the session data
        session()->destroy();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            $emailOrUsername = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            // Load UserModel to access users table
            $userModel = new UserModel();

            // Find user by email or username
            $user = $userModel->where('email', $emailOrUsername)
                              ->orWhere('user_name', $emailOrUsername)
                              ->first();

            if ($user && password_verify($password, $user['password'])) {
                // Start session and store user_id in session
                session()->set('user_id', $user['user_id']);
                
                // Redirect to ecommerce_home with success message
                return redirect()->to('/ecommerce_home')->with('success', 'Welcome back!');
            } else {
                // Authentication failed, redirect back with an error message
                return redirect()->back()->with('error', 'Invalid email/username or password.');
            }
        }

        // Load the login view
        $this->EcommerceHome();
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