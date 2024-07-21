<?php

namespace App\Controllers;

use App\Models\RegistrationModel;
use CodeIgniter\HTTP\ResponseInterface;

class PublicController extends BaseController
{
    protected $RegistrationModel;
    protected $cache;
    protected $useCache;
    protected $cacheTime;

    public function __construct() {
        $this->RegistrationModel = new RegistrationModel();
        $this->cache = \Config\Services::cache(); // Load the cache service
        $this->useCache = getenv('CI_ENVIRONMENT') === 'production'; // Only use cache in production
        $this->cacheTime = getenv('CI_CACHE_TIME') ? (int)getenv('CI_CACHE_TIME') : 600; // Cache time in seconds (10 minutes)
    }
    
    public function index(): string
    {
        return $this->renderView('public_index_view', [
            'public/public_header',
            'public/index',
            'public/public_footer'
        ]);
    }

    public function user_types(): string
    {
        return $this->renderView('user_types_view', [
            'public/public_header',
            'public/user_types',
            'public/public_footer'
        ]);
    }

    public function customer_registration(): string
    {
        return $this->renderView('customer_registration_view', [
            'public/public_header',
            'public/customer_registration',
            'public/public_footer'
        ]);
    }

    public function brand_partner_registration(): string
    {
        return $this->renderView('brand_partner_registration_view', [
            'public/public_header',
            'public/brand_partner_registration',
            'public/public_footer'
        ]);
    }

    public function coming_soon(): string
    {
        return $this->renderView('coming_soon_view', [
            'coming_soon'
        ]);
    }

    public function customerLogin(): string
    {
        return $this->renderView('customer_login_view', [
            'public/public_header',
            'public/customer_login',
            'public/public_footer'
        ]);
    }

    public function BrandPartnerDetails(): string
    {
        return $this->renderView('brand_partner_detals_view', [
            'public/public_header',
            'public/brand_partner_details',
            'public/public_footer'
        ]);
    }

    public function OTPVerification(): string
    {
        return $this->renderView('otp_verification_view', [
            'public/public_header',
            'public/otp_verification',
            'public/public_footer'
        ]);
    }

    public function register_customer(): ResponseInterface
    {
        $company_name = $this->request->getPost('companyName');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $inserted = $this->RegistrationModel->create_customer($company_name, $email, $password);
        if ($inserted == 'exists') {
            session()->setFlashdata('success', 'Account Exists');
        } else {
            if ($inserted) {
                session()->setFlashdata('success', 'Registration successful!');
            } else {
                session()->setFlashdata('error', 'Registration failed!');
            }
        }

        $this->cache->delete('customer_registration_view');

        return redirect()->to('/customer_registration');
    }

    public function register_brand_partner(): ResponseInterface
    {
        $company_name = $this->request->getPost('companyName');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');

        $inserted = $this->RegistrationModel->create_brand_partner($company_name, $phone, $email, $password);
        if ($inserted == 'exists') {
            session()->setFlashdata('success', 'Account Exists');
        } else {
            if ($inserted) {
                session()->setFlashdata('success', 'Registration successful!');
            } else {
                session()->setFlashdata('error', 'Registration failed!');
            }
        }

        $this->cache->delete('brand_partner_registration_view');

        return redirect()->to('/customer_login');
    }

    public function loginProcess(): ResponseInterface
    {
        try {
            // Retrieve phone number and password from POST request
            $phone = $this->request->getPost('phone');
            $password = $this->request->getPost('password');
    
            // Authenticate user
            $user_id = $this->RegistrationModel->customerLogin($phone, $password);
    
            if ($user_id) {
                // Store user_id in session
                session()->set('user_id', $user_id);
                
                // Fetch user's data from the database based on user_id
                $userData = $this->RegistrationModel->getUserDataById($user_id);
                
                // Store user data in session
                session()->set('user_data', $userData);
    
                // Set success flash message
                session()->setFlashdata('success', 'Login successful!');
                
                // Redirect to partner home page
                return redirect()->to('/partner_home');
            } else {
                // Set error flash message for invalid login
                session()->setFlashdata('error', 'Invalid phone number or password. Please try again.');
                return redirect()->to('/customer_login');
            }
        } catch (\Exception $e) {
            // Log the exception message
            log_message('error', 'Login process failed: ' . $e->getMessage());
            
            // Set generic error flash message
            session()->setFlashdata('error', 'An unexpected error occurred. Please try again later.');
            return redirect()->to('/customer_login');
        }
    }
    


    public function otp_login_process(): ResponseInterface
    {
        try {
            $phone = $this->request->getPost('phone');
            $otp = $this->request->getPost('otp');

            $loggedIn = $this->RegistrationModel->otpLogin($phone, $otp);
            if ($loggedIn) {
                session()->setFlashdata('success', 'Login successful!');
                return redirect()->to('/partner_home');
            } else {
                session()->setFlashdata('error', 'Invalid phone number or OTP. Please try again.');
                return redirect()->to('/customer_login');
            }
        } catch (\Exception $e) {
            log_message('error', 'Login process failed: ' . $e->getMessage());
            session()->setFlashdata('error', 'An unexpected error occurred. Please try again later.');
            return redirect()->to('/customer_login');
        }
    }

    /**
     * Renders content from cache if available, otherwise generates and caches it.
     *
     * @param string $cacheKey The cache key to use.
     * @param array $views An array of view names to be concatenated.
     * @return string The cached or generated content.
     */
    private function renderCache(string $cacheKey, callable $contentGenerator): string
    {
        if ($this->useCache) {
            $cachedContent = $this->cache->get($cacheKey);

            if ($cachedContent === null) {
                // Cache miss, generate the content
                $cachedContent = $contentGenerator();
                // Save the content to the cache
                $this->cache->save($cacheKey, $cachedContent, $this->cacheTime);
            }

            return $cachedContent;
        } else {
            // Cache disabled, generate the content directly
            return $contentGenerator();
        }
    }

    /**
     * Renders a series of views and caches the result.
     *
     * @param string $cacheKey The cache key to use.
     * @param array $views An array of view names to be concatenated.
     * @return string The cached or generated content.
     */
    private function renderView(string $cacheKey, array $views): string
    {
        return $this->renderCache($cacheKey, function() use ($views) {
            $content = '';
            foreach ($views as $view) {
                $content .= view($view);
            }
            return $content;
        });
    }
}
