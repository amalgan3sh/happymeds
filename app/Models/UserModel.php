<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // The table name in the database
    protected $primaryKey = 'user_id';  // Primary key field

    // Define the fields that can be inserted or updated
    protected $allowedFields = [
        'user_name', 'email', 'phone', 'password', 'company_name', 'otp', 'user_type',
        'firstname', 'lastname', 'designation', 'skills', 'gender', 'dob', 'country', 
        'city', 'about_me', 'profile_photo', 'language', 'age', 'experience', 
        'location', 'wallet_balance'
    ];

    // Automatically manage created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_date';  // Field for automatic created_at timestamps
    protected $updatedField  = 'updated_at';    // Field for automatic updated_at timestamps
}