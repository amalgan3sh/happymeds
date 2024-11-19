<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function addProduct()
    {
        $productModel = new ProductModel();

        // Get user_id from the session
        $userId = session()->get('user_id');
        
        if (!$userId) {
            // Redirect if the user_id is not in session (user not logged in)
            return redirect()->back()->with('error', 'You must be logged in to add a product.');
        }

        $data = [
            //'user_id'           =>  $userId, // Add the user_id to the data array
            'manufacturer_id'   =>  $userId,
            'ProductName'      => $this->request->getPost('productName'),
            'category'          => $this->request->getPost('category'),
            'DosageForm'       => $this->request->getPost('dosageForm'),
            'Strength'          => $this->request->getPost('strength'),
            'Content'          => $this->request->getPost('description'),
            'TherapeuticUse'   => $this->request->getPost('therapeuticUse'),
            'price'             => $this->request->getPost('price'),
            'stockQuantity'    => $this->request->getPost('stock'),
            'minOrderQuantity'=> $this->request->getPost('minOrderQty'),
            'sku'               => $this->request->getPost('sku'),
            'status'            => 'pending', // Default to 'pending' for admin approval
        ];

        $productName = $this->request->getPost('productName');
        // Handle file uploads
        $files = ['productImage', 'productBrochure', 'certifications'];
        foreach ($files as $file) {
            if ($this->request->getFile($file)->isValid()) {
                $uploadedFile = $this->request->getFile($file);
                $fileName = $uploadedFile->getRandomName();

                // Set the destination directory
                $destinationDir = FCPATH . 'products/'.$productName;

                // Check if the directory exists
                if (!is_dir($destinationDir)) {
                    // Create the directory with 0755 permissions if it doesn't exist
                    mkdir($destinationDir, 0755, true);
                }

                $uploadedFile->move($destinationDir, $fileName);
                if($file == 'productImage') {
                    $data['product_img_main'] = $fileName;
                }
                else{
                    $data[$file] = $fileName;
                }
                
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
        $productModel = new ManufacturerProductModel();

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
}