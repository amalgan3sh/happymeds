<?php

namespace App\Models;

use CodeIgniter\Model;

class B2BOrderModel extends Model
{
    protected $table = 'b2b_orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['user_id', 'order_items', 'total_amount', 'status'];
    protected $useTimestamps = true; // Automatically manage created_at and updated_at
}