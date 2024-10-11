<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use CodeIgniter\HTTP\ResponseInterface;

class TransactionController extends BaseController
{
    public function save()
    {
        // Start the session if not already started
        $session = session();

        // Get the user_id from the session
        $user_id = $session->get('user_id');
        if (!$user_id) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not logged in'
            ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }

        // Get JSON data from the request
        $input = $this->request->getJSON();

        // Validate the input
        if (!isset($input->amount, $input->payment_id, $input->name, $input->email)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid data'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Prepare data for saving in the database
        $transactionModel = new TransactionModel();
        $data = [
            'user_id' => 1, // Replace with a valid user_id from your users table
            'amount' => 1000.00,
            'payment_id' => 'TEST12345',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'status' => 'success',
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Attempt to insert the data and log any errors if insertion fails
        if ($transactionModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Transaction saved successfully'
            ]);
        } else {
            // Get the error messages
            $errors = $transactionModel->errors();
            log_message('error', 'Failed to save transaction: ' . json_encode($errors));

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to save transaction',
                'errors' => $errors // Return the specific error messages
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}