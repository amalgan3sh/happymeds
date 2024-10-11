<?php

namespace App\Controllers;

use App\Models\ManufacturerProductModel;

class ProductController extends BaseController
{
    public function addProduct()
    {
        $productModel = new ManufacturerProductModel();

        // Get user_id from the session
        $userId = session()->get('user_id');
        
        if (!$userId) {
            // Redirect if the user_id is not in session (user not logged in)
            return redirect()->back()->with('error', 'You must be logged in to add a product.');
        }

        $data = [
            'user_id'           =>  $userId, // Add the user_id to the data array
            'product_name'      => $this->request->getPost('productName'),
            'category'          => $this->request->getPost('category'),
            'dosage_form'       => $this->request->getPost('dosageForm'),
            'strength'          => $this->request->getPost('strength'),
            'description'       => $this->request->getPost('description'),
            'therapeutic_use'   => $this->request->getPost('therapeuticUse'),
            'price'             => $this->request->getPost('price'),
            'stock_quantity'    => $this->request->getPost('stock'),
            'min_order_quantity'=> $this->request->getPost('minOrderQty'),
            'sku'               => $this->request->getPost('sku'),
            'status'            => 'pending', // Default to 'pending' for admin approval
        ];

        // Handle file uploads
        $files = ['productImage', 'productBrochure', 'certifications'];
        foreach ($files as $file) {
            if ($this->request->getFile($file)->isValid()) {
                $uploadedFile = $this->request->getFile($file);
                $fileName = $uploadedFile->getRandomName();
                $uploadedFile->move(WRITEPATH . 'uploads', $fileName);
                $data[$file] = $fileName;
            }
        }

        // Save product data in the database
        $productModel->insert($data);

        return redirect()->back()->with('success', 'Product added successfully, awaiting admin approval.');
    }
}