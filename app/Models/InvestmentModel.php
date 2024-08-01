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
}
