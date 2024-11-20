<?php
namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_orders'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // Allowed fields for insert/update operations
    protected $allowedFields = [
        'order_id',
        'customer_id', // Updated from user_id to customer_id
        'manufacturer_id', // Added manufacturer_id
        'product_details',
        'total_amount',
        'created_at',
        'status'
    ];
}