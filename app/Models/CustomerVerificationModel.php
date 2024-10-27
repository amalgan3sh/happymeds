<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerVerificationModel extends Model
{
    protected $table = 'customer_verification';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name', 'email', 'phone', 'drug_license', 'address', 
        'city', 'zip_code', 'state', 'status', 'created_at'
    ];
}