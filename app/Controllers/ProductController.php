<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;

class ProductController extends BaseController
{
    public function addProduct()
    {
        // Check if the user is authenticated
        $user = $this->authenticate();
        if ($user instanceof \CodeIgniter\HTTP\RedirectResponse) {
            return $user; // Redirect to login if not authenticated
        }
        $productModel = new ProductModel();
    
        $productName = $this->request->getPost('ProductName');
        
        // Sanitize product name to create a valid directory and filename
        $sanitizedProductName = preg_replace('/[^A-Za-z0-9\-]/', '_', $productName);
    
        // Prepare data array
        $data = [
            'manufacturer_id'   => $user['user_id'],
            'ProductName'       => $productName,
            'Category'          => $this->request->getPost('DosageForm'), // Category is stored in DosageForm
            'DosageForm'        => $this->request->getPost('DosageForm'),
            'Strength'          => $this->request->getPost('Strength'),
            'Content'           => $this->request->getPost('Content'),
            'TherapeuticUse'    => $this->request->getPost('TherapeuticUse'),
            'price'             => $this->request->getPost('price'),
            'total_units'       => $this->request->getPost('total_units'),
            'status'            => 'pending', // Default to 'pending' for admin approval
        ];
    
        // Prepare upload directory
        $uploadDir = ROOTPATH . 'products/' . $sanitizedProductName . '/';
        
        // Ensure the directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
    
        // Handle file uploads
        $files = [
            'productImage' => 'product_img_main', 
            'productBrochure' => 'thumbnail', 
            'certifications' => 'product_images'
        ];
    
        foreach ($files as $formField => $dbField) {
            $uploadedFile = $this->request->getFile($formField);
            
            // Check if the file exists and is valid
            if ($uploadedFile && $uploadedFile->isValid()) {
                // Generate a unique filename
                $fileName = $sanitizedProductName . '_' . $formField . '.' . $uploadedFile->getExtension();
                
                // Move the uploaded file to the destination directory
                $uploadedFile->move($uploadDir, $fileName);
                
                // Store the relative path in the database
                $data[$dbField] = 'products/' . $sanitizedProductName . '/' . $fileName;
            }
        }
    
        // Save product data in the database
        $productModel->insert($data);
    
        return redirect()->back()->with('success', 'Product added successfully, awaiting admin approval.');
    }

    public function editProduct() {
        $productModel = new ManufacturerProductModel();

        // Get user_id from the session
        $userId = session()->get('user_id');
        $product_id = $this->request->getPost('id');
        
        if (!$userId) {
            // Redirect if the user_id is not in session (user not logged in)
            return redirect()->back()->with('error', 'You must be logged in to edit a product.');
        }


        $data = [
            'product_name'      => $this->request->getPost('productName'),
            'category'          => $this->request->getPost('category'),
            'price'             => $this->request->getPost('price'),
            'stock_status'      => $this->request->getPost('stock_status'),
            'stock_quantity'    => $this->request->getPost('stock'),
        ];

        // Update the user record
        if ($productModel->update($product_id, $data)) {
            return  redirect()->to('/business_home')->with('success', 'Product('.$this->request->getPost('productName').') details updated successfully.');
       } else {
            return  redirect()->to('/business_home')->with('error', 'Failed to update the product details. Please try again.');
       }
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();

        // Check if the product exists
        $product = $productModel->find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Delete the product
        if ($productModel->delete($id)) {
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the product.');
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