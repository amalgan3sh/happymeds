<?php

namespace App\Controllers;
use App\Models\CustomerVerificationModel;


class CheckoutController extends BaseController
{
    public function index()
    {
        // Retrieve cart items and total from the session
        $cartItems = $_SESSION['cart'] ?? [];
        $totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
        

        // Return header view and checkout view
        return view('ecommerce/ecommerce_header')
            . view('ecommerce/checkout', [
                'cartItems' => $cartItems,
                'totalAmount' => $totalAmount
            ]).view('ecommerce/ecommerce_footer');
    }

    public function process()
    {
        // Validate request and payment details here
        // Example:
        $paymentDetails = $this->request->getPost('payment_details');
        
        // Save the order details in the database
        // Logic to handle saving order details would go here

        // Clear cart after successful order
        $_SESSION['cart'] = [];

        // Redirect to a success page
        return redirect()->to('/checkout/success');
    }
    public function storeVerification()
    {
        $session = session();
        $userId = $session->get('user_id');
    
        // Fetch user email and phone from the users table
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);
    
        if (!$user) {
            // Redirect with error if user not found
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Prepare data for insertion into customer_verification table
        $verificationModel = new CustomerVerificationModel();
        $data = [
            'user_id' => $userId,
            'full_name' => $user['user_name'], // Assuming this is still provided by the form
            'email' => $user['email'],
            'phone' => $user['phone'],
            'drug_license' => $this->request->getPost('drug_license'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'zip_code' => $this->request->getPost('zip_code'),
            'state' => $this->request->getPost('state')
        ];
    
        // Insert data into customer_verification table
        if ($verificationModel->insert($data)) {
            $userModel->update($userId, ['kyc_verify' => 'pending']);

            $session->remove('cart'); // Clear the cart session data
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'Verification is in process, our agent will get in touch with you shortly.');
        } else {
            // Redirect back with error message if insertion fails
            return redirect()->back()->with('error', 'Failed to submit verification request. Please try again.');
        }
    }
}