<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_details';
    protected $primaryKey = 'product_detail_id';
    protected $allowedFields = ['product_name', 'category', 'price', 'trend_data', 'percentage_change', 'icon'];
}