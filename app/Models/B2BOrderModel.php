<?php

namespace App\Models;

use CodeIgniter\Model;

class B2BOrderModel extends Model
{
    protected $table = 'b2b_orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = [
        'user_id', 
        'order_items', 
        'total_amount', 
        'status', 
        'status_description', 
        'created_at', 
        'updated_at'
    ];
    protected $useTimestamps = true; // Automatically manage created_at and updated_at
    protected $createdField  = 'created_at'; // Define the column for creation timestamp
    protected $updatedField  = 'updated_at'; // Define the column for update timestamp
}