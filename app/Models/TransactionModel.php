<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'amount', 'payment_id', 'name', 'email', 'status', 'created_at'
    ];
    protected $useTimestamps = false;
}