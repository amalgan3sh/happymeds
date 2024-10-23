<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class StoreController extends Controller
{
    public function EcommerceHome()
    {
        // Load the ecommerce_header and ecommerce_home views
        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_home');
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