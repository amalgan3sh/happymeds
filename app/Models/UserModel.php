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

    // Function to get user by email for password reset
    public function get_user_by_email($email)
    {
        return $this->where('email', $email)->first();
    }

    // Function to store the password reset token
    public function store_reset_token($email, $token)
    {
        $data = [
            'email' => $email,
            'token' => $token,
            'created_at' => time(),
        ];
        
        // Insert the reset token into the password_resets table
        return $this->db->table('password_resets')->insert($data);
    }

    // Function to get user by token (to verify and reset password)
    public function get_user_by_token($token)
    {
        return $this->db->table('password_resets')->where('token', $token)->get()->getRowArray();
    }

    // Function to update the user's password
    public function update_password($email, $new_password)
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update the user's password
        return $this->update(['email' => $email], ['password' => $hashed_password]);
    }

    // Function to remove the reset token after password is updated
    public function remove_reset_token($token)
    {
        return $this->db->table('password_resets')->where('token', $token)->delete();
    }
}