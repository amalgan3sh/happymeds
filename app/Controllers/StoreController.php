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
}
