<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductRequestModel extends Model
{
    protected $table = 'product_request';
    protected $primaryKey = 'req_id';
    protected $allowedFields = ['prod_name', 'category', 'dosage_form', 'strength', 'description', 'therapeutic_use', 'product_image', 'product_brochure', 'certifications'];
}