<?php

namespace App\Models;

use CodeIgniter\Model;

class QuotationModel extends Model
{
    protected $table = 'quotations';
    protected $primaryKey = 'quotation_id';
    protected $allowedFields = ['order_id', 'user_id', 'product_names', 'total_amount', 'status', 'created_at'];
}