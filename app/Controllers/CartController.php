<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function addToCart()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = 1;  // Default quantity
    
        $productModel = new ProductModel();
        $product = $productModel->find($productId);
    
        if ($product) {
            $session = session();
            $cart = $session->get('cart') ?? [];
    
            // If product already in cart, increase quantity; else add new item
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'product_id' => $product['product_id'],
                    'ProductName' => $product['ProductName'],
                    'thumbnail' => $product['thumbnail'],
                    'DosageForm' => $product['DosageForm'],
                    'quantity' => $quantity,
                    'price' => $product['price'],
                ];
            }
    
            // Update session with cart data
            $session->set('cart', $cart);
    
            // Debug statement to check the session data
            error_log(print_r($session->get('cart'), true)); // This will log the cart data to the PHP error log
    
            return $this->response->setJSON(['status' => 'success', 'message' => 'Product added to cart']);
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
    }

    public function index()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        
        // Calculate the total amount
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
    
        // Pass cart items and total to the view
        $data = [
            'cartItems' => $cart,
            'totalAmount' => $totalAmount
        ];
    
        return view('ecommerce/shop_cart', $data);
    }
    
    // Add this method for updating quantities
    public function update()
    {
        $productId = $this->request->getPost('product_id');
        $change = $this->request->getPost('change');
        
        $session = session();
        $cart = $session->get('cart') ?? [];
        
        if (isset($cart[$productId])) {
            // Update quantity, ensuring it doesn't go below 1
            $newQuantity = $cart[$productId]['quantity'] + $change;
            if ($newQuantity >= 1) {
                $cart[$productId]['quantity'] = $newQuantity;
                $session->set('cart', $cart);
            }
        }
        
        return $this->response->setJSON(['status' => 'success']);
    }
    
    // Add this method for removing items
    public function remove($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $session->set('cart', $cart);
        }
        
        return redirect()->to('shop_cart');
    }
    
    // Add this method for clearing the cart
    public function clear()
    {
        $session = session();
        $session->remove('cart');
        return redirect()->to('shop_cart');
    }
}