<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketModel extends Model
{
    protected $table = 'market_previews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'product_name', 'category', 'month', 'current_price', 'percentage_change', 'trend_data'];

    public function getMarketPreview()
    {
        return $this->findAll();
    }
}