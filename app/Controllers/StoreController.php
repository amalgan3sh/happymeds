<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use App\Models\ProductModel;

class StoreController extends Controller
{
    public function EcommerceHome()
    {
        // Load the ecommerce_header and ecommerce_home views
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        $data['topSellingProducts'] = $productModel
            ->orderBy('sold_units', 'DESC')
            ->limit(3)
            ->findAll();
        
        $data['trendingProducts'] = $productModel
            ->orderBy('rating', 'DESC')  // or use 'sold_units' or any other criteria for trending
            ->limit(3)
            ->findAll();

        $data['recentlyAddedProducts'] = $productModel
            ->orderBy('created_at', 'DESC') // Order by most recent
            ->limit(3)
            ->findAll(); 
            
        $data['topRatedProducts'] = $productModel
            ->orderBy('rating', 'DESC') // Order by highest rating
            ->limit(3)
            ->findAll();

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_home',$data);
        echo view('ecommerce/ecommerce_footer');
    }

    public function HomePageEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/home_page_ecommerce');
        echo view('ecommerce/ecommerce_footer');
    }

    public function ShopEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/shop_ecommerce');
        echo view('ecommerce/ecommerce_footer');
    }

    public function aboutEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/about');
        echo view('ecommerce/ecommerce_footer');
    }

    public function accountEcommerce()
    {
        echo view('ecommerce/account');
    }

    public function contacttEcommerce()
    {
        echo view('ecommerce/contact');
    }

    public function KidsMedicineEcommerce()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/kids_medicine');
        echo view('ecommerce/ecommerce_footer');
    }

    public function AdultMedicine()
    {
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/adult_medicine');
        echo view('ecommerce/ecommerce_footer');
    }
}