<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $table = 'users'; // Name of the table
    protected $primaryKey = 'user_id'; // Primary key of the table
    protected $allowedFields = [
        'user_id', 
        'user_name', 
        'email', 
        'phone', 
        'password', 
        'company_name', 
        'otp', 
        'user_type', 
        'created_date', 
        'firstname', 
        'lastname', 
        'designation', 
        'skills', 
        'gender', 
        'dob', 
        'country', 
        'city', 
        'about_me', 
        'profile_photo', 
        'language', 
        'age', 
        'experience', 
        'location'
    ]; // Fields allowed for mass assignment

    /**
     * Retrieve partner profile by user ID
     */
    public function getUserById($user_id)
    {
        return $this->where('user_id', $user_id)->first();
    }

    /**
     * Create a new partner profile
     */
    public function createProfile($data)
    {
        return $this->insert($data);
    }

    /**
     * Update an existing partner profile
     */
    public function updateUser($profile_id, $data)
    {
        $profile_idInt = (int) $profile_id;
        return $this->update( $profile_idInt, $data);
    }

    /**
     * Delete a partner profile
     */
    public function deleteProfile($profile_id)
    {
        return $this->delete($profile_id);
    }

}
