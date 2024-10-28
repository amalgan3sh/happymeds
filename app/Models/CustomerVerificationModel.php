<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerVerificationModel extends Model
{
    protected $table = 'customer_verification';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'full_name',
        'dob',
        'nationality',
        'drug_license_number',
        'medical_license_number',
        'business_address',
        'contact_number',
        'official_email',
        'tax_identification_number',
        'pan_card_number',
        'handling_certification',
        'gmp_compliance',
        'status'
    ];
}