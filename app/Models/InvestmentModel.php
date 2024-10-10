<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestmentModel extends Model
{
    protected $table = 'investment_request';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 
        'product_id', 
        'plan', 
        'status', 
        'time_stamp', 
    ];

    public function getInvestmentsDetailsByUserId($user_id) 
    {
        // Perform a join with the product_data table
        return $this->select('investment_request.*, product_data.productName')
                    ->join('product_data', 'product_data.product_id = investment_request.product_id')
                    ->where('investment_request.user_id', $user_id)
                    ->findAll();
    }
}
