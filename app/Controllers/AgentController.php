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
use CodeIgniter\Database\Database;
use Dompdf\Dompdf;
use Dompdf\Options;

class AgentController extends Controller
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



    public function AgentHome()
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
        
        // Get total customers (users with the agent_id = user_id)
        $userModel = new UserModel();
        $data['totalCustomers'] = $userModel->where('agent_id', $userId)->countAllResults();

        // Get distributors count (users with agent_id = user_id and user_type = 'distributor')
        $data['distributorCount'] = $userModel->where('agent_id', $userId)
            ->where('user_type', 'distributor')
            ->countAllResults();
        
        // Get franchise count (users with agent_id = user_id and user_type = 'franchise')
        $data['franchiseCount'] = $userModel->where('agent_id', $userId)
            ->where('user_type', 'franchise')
            ->countAllResults();
        
        // Get manufacturer count (users with agent_id = user_id and user_type = 'manufacturer')
        $data['manufacturerCount'] = $userModel->where('agent_id', $userId)
            ->where('user_type', 'manufacturer')
            ->countAllResults();
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_home', [
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
            'totalCustomers' => $data['totalCustomers'],
            'distributorCount' => $data['distributorCount'],
            'franchiseCount' => $data['franchiseCount'],
            'manufacturerCount' => $data['manufacturerCount'],
        ]);
        
        return $header . $home;
    }

    public function AgentAddCustomer()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_add_customer', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }
    public function AgentViewCustomer()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_view_customer', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }
    public function AgentAddCustomerBankAccount()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_add_customer_bank_account', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }
    public function AgentProductMaster()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_product_master', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }

    public function AgentViewProducts()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_view_products', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }
    public function AgentPreCosting()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_pre_costing', [
            'user' => $user,
        ]);
        
        return $header . $home;
    }

    public function AgentCosting()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_costing', [
            'user' => $user,
        ]);
        
        return $header . $home;
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
}