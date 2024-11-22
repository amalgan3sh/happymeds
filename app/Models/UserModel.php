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
        'location', 'wallet_balance', 'total_investment', 'total_turnover', 
        'kyc_verify', 'reset_token', 'reset_token_expires'
    ];
    // Automatically manage created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_date';  // Field for automatic created_at timestamps
    protected $updatedField  = 'updated_at';    // Field for automatic updated_at timestamps

    public function get_user_by_email($email)
    {
        return $this->db->table('users') // 'users' is the table name
                    ->where('email', $email)
                    ->get()
                    ->getRow();
    }

    public function store_reset_token($user_id, $token)
    {
        return $this->db->table('users')  // 'users' should be the name of your table
        ->where('user_id', $user_id)
        ->update(['reset_token' => $token]);
    }

    public function get_user_by_token($token)
    {
        return $this->db->table('users') // Use table() to specify the table
        ->where('reset_token', $token) // Add your condition
        ->get() // Execute the query
        ->getRow(); // Fetch a single row
    }

    public function update_password($user_id, $hashed_password)
    {
        // Use Query Builder to update the password field
    return $this->db->table('users') // Specify the table
    ->where('user_id', $user_id) // Find the user by ID
    ->update(['password' => $hashed_password]); // Update the password field
    }

    public function clear_reset_token($user_id)
    {
        // Use Query Builder to update the reset_token field to NULL
    return $this->db->table('users') // Specify the table
    ->where('user_id', $user_id) // Find the user by ID
    ->update(['reset_token' => null]); // Clear the reset token
    }   

}