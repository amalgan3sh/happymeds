<?php

namespace App\Models;

use CodeIgniter\Model;

class BankAccountModel extends Model
{
    protected $table = 'bank_account_details';
    protected $primaryKey = 'account_id';
    protected $allowedFields = [
        'user_id', 
        'account_number', 
        'ifsc', 
        'name', 
        'branch', 
        'city', 
        'state', 
        'zip'
    ];
}
