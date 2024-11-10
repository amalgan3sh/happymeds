<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews'; // Table name
    protected $primaryKey = 'id'; // Primary key

    // Define fields that are allowed for mass assignment
    protected $allowedFields = ['user_id', 'rating', 'comment', 'created_at','product_id'];

    // Timestamps (automatically manage `created_at` and `updated_at` fields)
    protected $useTimestamps = true;

    // Validation rules if you want to validate data before inserting/updating
    protected $validationRules = [
        'rating' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        'comment' => 'permit_empty|string|max_length[255]',
        'user_id' => 'required|integer'
    ];

    /**
     * Calculate the average rating for a specific product.
     *
     * @param int $product_id The ID of the product
     * @return float The average rating, or 0 if no ratings found
     */
    public function getAverageRating($product_id)
    {
        $result = $this->selectAvg('rating')
                       ->where('product_id', $product_id)
                       ->get()
                       ->getRow();
        
        // Return 0 if there are no reviews, otherwise return the calculated average
        return $result && $result->rating !== null ? (float) $result->rating : 0.0;
    }
}
