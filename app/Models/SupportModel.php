<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportModel extends Model
{
    protected $table      = 'support_requests'; // The table where data is being inserted
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'message', 'created_at', 'user_id','status']; // Ensure these fields match the database table

    protected $returnType     = 'array';
    protected $useTimestamps  = false;  // If you're handling timestamps manually
}
