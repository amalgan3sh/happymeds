<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_data';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['ProductName', 'Content', 'DosageForm', 'Strength', 'TherapeuticUse', 'TabletShapeAndColor', 'Packaging', 'UnitSize', 'ShipperSize','icon','product_images','product_img_main','rating'];
}