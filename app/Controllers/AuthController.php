<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        // Load the session service
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        // Your login logic here
    }

    public function logout()
    {
        // Destroy the session
        $this->session->destroy();

        // Redirect to customer login page
        return redirect()->to('/customer_login')->with('info', 'You have been logged out.');
    }
}
