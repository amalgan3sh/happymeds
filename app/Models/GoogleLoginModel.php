<?php

namespace App\Models;

use CodeIgniter\Model;

class GoogleLoginModel extends Model
{
    protected $table = 'users'; // Your users table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['login_oauth_uid', 'first_name', 'last_name', 'email_address', 'profile_picture', 'created_at', 'updated_at'];

    public function isAlreadyRegistered($id)
    {
        return $this->where('login_oauth_uid', $id)->first() !== null;
    }

    public function updateUserData($data, $id)
    {
        return $this->where('login_oauth_uid', $id)->set($data)->update();
    }

    public function insertUserData($data)
    {
        return $this->insert($data);
    }
}
