<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportModel extends Model
{
    protected $table = 'support_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 
        'email', 
        'message', 
        'created_at'
    ];
}
