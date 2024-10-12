<?php

namespace App\Models;

use CodeIgniter\Model;

class KycVerificationModel extends Model
{
    protected $table = 'kyc_verifications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name', 'last_name', 'dob', 'nationality', 'email', 'phone', 
        'address', 'city', 'state', 'company_name', 'registration_number', 
        'company_email', 'company_phone', 'website', 'bank_name', 
        'account_number', 'swift_code', 'tin', 'vat_number', 
        'identity_proof', 'address_proof', 'bank_statement', 
        'created_at', 'updated_at', 'user_id'
    ];
}
