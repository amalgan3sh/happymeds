<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product_data';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['ProductName', 'Content', 'DosageForm', 'Strength', 'TherapeuticUse', 'TabletShapeAndColor', 'Packaging', 'UnitSize', 'ShipperSize','icon','product_images','product_img_main','rating','thumbnail','sold_units', 'total_units','price'];



    public function updateReview($product_id, $avgRating)
    {
        return $this->update($product_id, ['rating' => $avgRating]);
    }

    /**
     * Retrieve the top 5 trending products with a rating higher than 4.
     *
     * @return array|null The top 5 trending products or null if none found
     */
    public function getTrendingBrands()
    {
        return $this->where('rating >', 4)
                    ->orderBy('rating', 'DESC')
                    ->limit(5)
                    ->findAll();
    }
}