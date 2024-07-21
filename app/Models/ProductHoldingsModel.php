<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductHoldingsModel extends Model
{
    protected $table = 'product_holdings';
    protected $primaryKey = 'holding_id';
    protected $allowedFields = ['product_id', 'product_name', 'holding_value', 'change_percentage', 'week_change'];

    public function getProductHoldingsWithIcons()
    {
        return $this->db->table('product_holdings')
            ->select('product_holdings.*, product_data.icon,product_data.ProductName')
            ->join('product_data', 'product_holdings.product_id = product_data.product_id', 'inner')
            ->get()
            ->getResultArray();
    }
}
