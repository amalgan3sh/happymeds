<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // The table name in the database
    protected $primaryKey = 'user_id';

    // Define the fields that can be inserted or updated
    protected $allowedFields = ['user_name', 'email', 'phone', 'password', 'user_type','kyc_verify'];

    // Optional: Automatically manage created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_date';  // Field for automatic created_at timestamps
    protected $updatedField  = 'updated_at';    // Field for automatic updated_at timestamps
}