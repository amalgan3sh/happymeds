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

class DistributorController extends Controller
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


    public function DistributorRequirement()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }

        $userId = $user['user_id'];

        // Manually load the database
        $db = \Config\Database::connect();

        // Fetch requirements from the database with an INNER JOIN on the users table
        $builder = $db->table('b2b_orders');
        $builder->select('b2b_orders.*, users.user_name as manufacturer_name, users.company_name as manufacturer_company');
        $builder->join('users', 'users.user_id = b2b_orders.manufacturer_id', 'inner');
        $builder->where('b2b_orders.user_id', $userId);
        $requirements = $builder->get()->getResult();

        // Fetch manufacturers from the users table where user_type is 'manufacturer'
        $userModel = new UserModel();
        $manufacturers = $userModel->where('user_type', 'manufacturer')->findAll();

        // Pass the user's data, requirements, and manufacturers to the views
        $header = view('business/business_header', ['user' => $user]);
        $home = view('business/distributor_requirment', [
            'user' => $user,
            'requirements' => $requirements,
            'manufacturers' => $manufacturers
        ]);

        // Return the combined views
        return $header . $home;
    }

    public function getProductsByManufacturer($manufacturerId)
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }
        // Load the product model
        $productModel = new ProductModel();

        // Fetch products by manufacturer ID
        $products = $productModel->where('manufacturer_id', $manufacturerId)->findAll();

        // Return the products as JSON response
        return $this->response->setJSON($products);
    }

    public function deleteRequirement()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }
        $orderId = $this->request->getPost('order_id');
        $b2bOrderModel = new B2BOrderModel();

        if ($b2bOrderModel->delete($orderId)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Order deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete order.']);
        }
    }

    public function viewRequirement($orderId)
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }
        $userModel = new \App\Models\UserModel(); // Ensure you have a UserModel defined for users table.

        // Load the order data from the model
        $b2bOrderModel = new B2BOrderModel();
        $order = $b2bOrderModel->find($orderId);
    
        if ($order) {

            $distributor = $userModel->find($user['user_id']);
            $manufacturer = $userModel->find($order['manufacturer_id']); // Fetch manufacturer details


            if (!$distributor) {
                return redirect()->back()->with('error', 'Distributor details not found.');
            }


            // Prepare data for the view
            $data = [
                'order' => $order,
                'distributor' => $distributor,
                'manufacturer' => $manufacturer,
            ];
    
            // Render the HTML view with the order data
            $html = view('business/distributor/view_requirement_pdf', $data);
    
            // Setup Dompdf options
            $options = new \Dompdf\Options();
            $options->set('isRemoteEnabled', true); // Enable fetching of remote images and CSS
            $dompdf = new \Dompdf\Dompdf($options);
    
            // Load the HTML content to Dompdf
            $dompdf->loadHtml($html);
    
            // Set paper size and orientation (A4 Portrait)
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the HTML as PDF
            $dompdf->render();
    
            // Output the generated PDF to the browser
            // Set "Attachment" => true to force download
            $dompdf->stream("Product_Requirement_$orderId.pdf", ["Attachment" => false]);
        } else {
            // Redirect back with an error message if order not found
            return redirect()->back()->with('error', 'Order not found.');
        }
    }

    public function submitProductRequirement()
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }

        $user = $this->authenticate();
    
        $b2bOrderModel = new B2BOrderModel();
        $productModel = new ProductModel();
    
    
        // Fetch product IDs from the request
        $productIds = $this->request->getPost('product');
    
        // Fetch product details from the database
        $productsData = $productModel->whereIn('product_id', $productIds)->findAll();
        if (empty($productsData)) {
            return redirect()->back()->with('error', 'No valid products found.');
        }
    
        // Format the product data into the required structure
        $formattedProducts = [];
        foreach ($productsData as $index => $product) {
            $formattedProducts[$index + 1] = [
                'product_id'  => $product['product_id'],
                'ProductName' => $product['ProductName'],
                'thumbnail'   => $product['thumbnail'],
                'DosageForm'  => $product['DosageForm'],
                'quantity'    => 1, // Default quantity, can be adjusted as needed
                'price'       => $product['price'],
            ];
        }
    
        // Prepare data for insertion
        $data = [
            'user_id'            => $user['user_id'],
            'order_items'        => json_encode($formattedProducts),
            'total_amount'       => $this->calculateTotalAmount($formattedProducts),
            'status'             => 'Pending', // Default status
            'status_description' => 'Awaiting approval',
            'manufacturer_id'    => $this->request->getPost('manufacturer'),
        ];
    
        // Save the data
        if ($b2bOrderModel->insert($data)) {
            return redirect()->to(base_url('/distributor_requirement'))->with('success', 'Order submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to submit the order. Please try again.');
        }
    }

    private function calculateTotalAmount(array $products): float
    {
        // Use the authenticate method to check the session and get user data
        $user = $this->authenticate();
        // Check if the authenticate method returned a RedirectResponse
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Return the redirect response to stop further execution
        }

        $total = 0;
        foreach ($products as $product) {
            $total += $product['quantity'] * $product['price'];
        }
        return $total;
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