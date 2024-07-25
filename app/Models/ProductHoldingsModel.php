<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductHoldingsModel extends Model
{
    protected $table = 'product_holdings';
    protected $primaryKey = 'holding_id';
    protected $allowedFields = ['product_id', 'product_name', 'holding_value', 'change_percentage', 'week_change','favorite'];

    public function getProductHoldingsWithIcons()
    {
        return $this->db->table('product_holdings')
            ->select('product_holdings.*, product_data.icon,product_data.ProductName')
            ->join('product_data', 'product_holdings.product_id = product_data.product_id', 'inner')
            ->get()
            ->getResultArray();
    }


    /**
     * Mark the product as favorite
     */
    public function updateFavorite($product_id)
    {
        log_message('info', 'Toggled favorite status for product ID: ' . $product_id);

        $product = $this->find($product_id);
        if ($product) {
            // Check if the 'favorite' key exists in the array
            if (array_key_exists('favorite', $product)) {
                // Toggle the favorite status
                $new_status = !$product['favorite'];
                
                // Update the product's favorite status in the database
                if ($this->update($product_id, ['favorite' => $new_status])) {
                    // Return both success status and new favorite status
                    return [
                        'success' => true,
                        'new_status' => $new_status
                    ];
                }
            } else {
                // Log a warning if 'favorite' key does not exist
                log_message('error', "The 'favorite' key does not exist for product ID: $product_id.");
            }
        } else {
            // Log a warning if the product does not exist
            log_message('error', "Product not found for ID: $product_id.");
        }

        return false;
    }

}
