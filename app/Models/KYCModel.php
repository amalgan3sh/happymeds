<?php

namespace App\Models;

use CodeIgniter\Model;

class KycModel extends Model
{
    protected $table = 'kyc_verifications'; // Your database table name
    protected $primaryKey = 'id';

    protected $allowedFields = ['full_name', 'address', 'phone_no', 'document_path'];

    // Enable timestamps if your table has created_at and updated_at columns
    protected $useTimestamps = true;
}
