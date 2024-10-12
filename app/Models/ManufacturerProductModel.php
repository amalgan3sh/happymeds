<?php

namespace App\Models;

use CodeIgniter\Model;

class ManufacturerProductModel extends Model
{
    protected $table = 'manufacturer_products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', // Add user_id here
        'product_name', 
        'category', 
        'dosage_form', 
        'strength', 
        'description', 
        'therapeutic_use', 
        'price', 
        'stock_quantity', 
        'min_order_quantity', 
        'sku', 
        'product_image', 
        'product_brochure', 
        'certifications', 
        'status'
    ];
}