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
use App\Models\BankAccountModel;

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

    public function submitProductData()
    {
        try {
            $user = $this->authenticate();
            // Initialize the product model
            $productModel = new ProductModel();
    
            // Get the product name from the form
            $productName = $this->request->getPost('ProductName');
    
            // Generate a unique prefix for filenames based on the product name
            $productPrefix = str_replace(' ', '_', strtolower($productName)) . '_' . time();
    
            // Set the upload path to root/products/
            $uploadPath = ROOTPATH . 'products/';
    
            // Ensure the products folder exists
            if (!is_dir($uploadPath)) {
                if (!mkdir($uploadPath, 0755, true)) {
                    throw new \RuntimeException('Failed to create directory: ' . $uploadPath);
                }
            }
    
            // Handle main product image
            $mainImageName = '';
            $mainImage = $this->request->getFile('product_img_main');
            if ($mainImage && $mainImage->isValid()) {
                $mainImageName = $productPrefix . '_main_' . $mainImage->getRandomName();
                if (!$mainImage->move($uploadPath, $mainImageName)) {
                    throw new \RuntimeException('Failed to move main image');
                }
            }
    
            // Handle additional product images
            $imagePaths = [];
            $productImages = $this->request->getFileMultiple('product_images');
            if (is_array($productImages)) {
                foreach ($productImages as $image) {
                    if ($image->isValid()) {
                        $imageName = $productPrefix . '_extra_' . $image->getRandomName();
                        if ($image->move($uploadPath, $imageName)) {
                            $imagePaths[] = 'products/' . $imageName;
                        }
                    }
                }
            }
    
            // Handle thumbnail
            $thumbnailName = '';
            $thumbnail = $this->request->getFile('thumbnail');
            if ($thumbnail && $thumbnail->isValid()) {
                $thumbnailName = $productPrefix . '_thumbnail_' . $thumbnail->getRandomName();
                if (!$thumbnail->move($uploadPath, $thumbnailName)) {
                    throw new \RuntimeException('Failed to move thumbnail');
                }
            }
    
            // Get icon URL
            $iconURL = $this->request->getPost('icon');
    
            // Prepare data for database insertion
            $data = [
                'ProductName' => $productName,
                'Content' => $this->request->getPost('Content'),
                'DosageForm' => $this->request->getPost('DosageForm'),
                'Strength' => $this->request->getPost('Strength'),
                'TherapeuticUse' => $this->request->getPost('TherapeuticUse'),
                'TabletShapeAndColor' => $this->request->getPost('TabletShapeAndColor'),
                'Packaging' => $this->request->getPost('Packaging'),
                'UnitSize' => $this->request->getPost('UnitSize'),
                'ShipperSize' => $this->request->getPost('ShipperSize'),
                'icon' => $iconURL,
                'product_img_main' => $mainImageName ? 'products/' . $mainImageName : null,
                'product_images' => !empty($imagePaths) ? json_encode($imagePaths) : null,
                'thumbnail' => $thumbnailName ? 'products/' . $thumbnailName : null,
                'rating' => $this->request->getPost('rating'),
                'sold_units' => $this->request->getPost('sold_units'),
                'price' => $this->request->getPost('Price'),
                'total_units' => $this->request->getPost('stockQuantity'),
                // 'minOrderQuantity' => $this->request->getPost('minOrderQuantity'),
                // 'sku' => $this->request->getPost('sku'),
                'status' => 'pending',
                // 'category' => $this->request->getPost('category'),
                'manufacturer_id' => $this->request->getPost('ManufacturerName'),
                'agent_id' => $user['user_id'],
            ];
    
            // Insert data into the database
            if ($productModel->save($data)) {
                return redirect()->to('/agent_product_master')->with('success', 'Product has been successfully added.');
            }
    
            return redirect()->back()->withInput()->with('error', 'Failed to save product data.');
        } catch (\Exception $e) {
            log_message('error', '[Product Upload] ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to upload files: ' . $e->getMessage());
        }
    }

    public function saveBankAccount()
    {
        $user = $this->authenticate();

        // If validation passes, save data
        $bankAccountModel = new BankAccountModel();

        $data = [
            'user_id'        => $this->request->getPost('user_id'),
            'account_number' => $this->request->getPost('account_number'),
            'ifsc'           => $this->request->getPost('ifsc'),
            'name'           => $this->request->getPost('name'),
            'branch'         => $this->request->getPost('branch'),
            'city'           => $this->request->getPost('city'),
            'state'          => $this->request->getPost('state'),
            'zip'            => $this->request->getPost('zip'),
        ];

        if ($bankAccountModel->insert($data)) {
            return redirect()->back()->with('success', 'Bank account details saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to save bank account details. Please try again.');
        }
    }

    public function AgentViewCustomer()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        $userModel = new UserModel();

        // Fetch customers based on agent_id (user_id)
        $customers = $userModel->where('agent_id', $user['user_id'])->findAll();
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_view_customer', [
            'user' => $user,
            'customers' => $customers
        ]);
        
        return $header . $home;
    }

    public function deleteUser($user_id)
    {
        $user = $this->authenticate();
        // Load the model
        $userModel = new \App\Models\UserModel();

        // Find the user by ID
        $user = $userModel->find($user_id);

        if ($user) {
            // Delete the user from the database
            $userModel->delete($user_id);

            // Return a success response
            return $this->response->setJSON(['success' => true]);
        } else {
            // Return an error response if user is not found
            return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
        }
    }
    public function AgentAddCustomerBankAccount()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // If $user is a RedirectResponse, return it immediately
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Redirect to the login page
        }
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        $userModel = new \App\Models\UserModel();

        // Get users where `agent_id` matches the authenticated user's `user_id`
        $associatedUsers = $userModel->where('agent_id', $user['user_id'])->findAll();

        // Load the BankAccountModel to fetch bank accounts
        $bankAccountModel = new \App\Models\BankAccountModel();
        
        // Fetch bank account details along with the user's name
        $bankAccountModel = new \App\Models\BankAccountModel();
        $builder = $bankAccountModel->builder();
        $builder->select('bank_account_details.*, users.user_id, users.firstname, users.lastname, users.user_name'); // Select relevant fields
        $builder->join('users', 'users.user_id = bank_account_details.user_id', 'inner');
        $builder->where('users.agent_id', $user['user_id']);  // Filter by agent_id
        $bankAccounts = $builder->get()->getResultArray();
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_add_customer_bank_account', [
            'user' => $user,
            'associatedUsers' => $associatedUsers,
            'bankAccounts' => $bankAccounts,
        ]);
        
        return $header . $home;
    }

    public function delete($id)
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();

        // If $user is a RedirectResponse, return it immediately
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Redirect to the login page
        }
        $bankAccountModel = new BankAccountModel();
        
        // Find the bank account by ID
        $bankAccount = $bankAccountModel->find($id);
        
        // Check if the bank account exists
        if (!$bankAccount) {
            return redirect()->back()->with('error', 'Bank account not found.');
        }
        
        // Delete the bank account
        if ($bankAccountModel->delete($id)) {
            return redirect()->back()->with('success', 'Bank account deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the bank account.');
        }
    }

    public function AgentProductMaster()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // If $user is a RedirectResponse, return it immediately
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Redirect to the login page
        }
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        $userModel = new \App\Models\UserModel();

        $manufacturers = $userModel->where('user_type', 'manufacturer')->findAll();

        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_product_master', [
            'user' => $user,
            'manufacturers' => $manufacturers
        ]);
        
        return $header . $home;
    }

    public function AgentViewProducts()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        
        // Check if the user's KYC is verified
        $isKycVerified = !empty($user['kyc_verify']) ? $user['kyc_verify'] : 'Pending';
        // Load the Products model
        $productsModel = new \App\Models\ProductModel();

        // Fetch all products associated with the agent
        $products = $productsModel->where('agent_id', $user['user_id'])->findAll();
        
        
        // Pass the user's data, KYC status, and order counts to the views
        $header = view('business/agent/agent_header', ['user' => $user]);
        $home = view('business/agent/agent_view_products', [
            'user' => $user,
            'products' => $products
        ]);
        
        return $header . $home;
    }
    public function delete_product($product_id)
    {
        // Check if the user is authenticated
        $user = $this->authenticate();
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Redirect to login if not authenticated
        }

        // Load the ProductModel
        $productModel = new \App\Models\ProductModel();

        // Try to delete the product by its ID
        if ($productModel->delete($product_id)) {
            // Set a success message
            session()->setFlashdata('success', 'Product deleted successfully.');
        } else {
            // Set an error message
            session()->setFlashdata('error', 'Failed to delete the product. Please try again.');
        }

        // Redirect back to the product listing page
        return redirect()->to(base_url('agent_view_products'));
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

    public function submitCustomer()
    {
        $user = $this->authenticate();
        // Create an instance of the UserModel to interact with the database
        $userModel = new \App\Models\UserModel();
    
        // Get the form data from the POST request
        $data = [
            'user_name'     => $this->request->getPost('user_name'),
            'email'         => $this->request->getPost('email'),
            'phone'         => $this->request->getPost('phone'),
            'firstname'     => $this->request->getPost('firstname'),
            'lastname'      => $this->request->getPost('lastname'),
            'company_name'  => $this->request->getPost('company_name'),
            'user_type'     => $this->request->getPost('user_type'),
            'location'      => $this->request->getPost('location'),
            'country'       => $this->request->getPost('country'),
            'city'          => $this->request->getPost('city'),
            'gender'        => $this->request->getPost('gender'),
            'dob'           => $this->request->getPost('dob'),
            'skills'        => $this->request->getPost('skills'),
            'about_me'      => $this->request->getPost('about_me')
        ];
        $data['password'] = password_hash($data['user_name'], PASSWORD_DEFAULT); 
        $data['agent_id'] = $user['user_id'];
        $data['kyc_verify'] = 'pending';
    
        // Insert the data into the database
        if ($userModel->insert($data)) {
            // Redirect to Agent View Customer page
            return redirect()->to('/agent_view_customer');
        } else {
            // Handle the error if insertion fails
            return redirect()->back()->with('error', 'Failed to save customer data.');
        }
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
            return redirect()->to('/public_login')->with('error', 'Please log in first')->send();
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