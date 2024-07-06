<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'TransactionID';
    protected $allowedFields = ['transactionID', 'date', 'from_user', 'to_user', 'Product', 'amount', 'status'];
}
