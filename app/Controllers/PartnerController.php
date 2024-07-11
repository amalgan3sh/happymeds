<?php

namespace App\Controllers;
use App\Models\PartnerModel; 
use App\Models\TransactionModel;
use App\Models\MarketModel;
use App\Models\ProductModel;



class PartnerController extends BaseController
{
    protected $partnerModel;
    protected $cache;
    protected $useCache;
    protected $cacheTime;

    public function __construct()
    {
        $this->partnerModel = new PartnerModel(); // Initialize the model
        $this->cache = \Config\Services::cache(); // Load the cache service
        $this->useCache = getenv('CI_ENVIRONMENT') === 'production'; // Only use cache in production
        $this->cacheTime = getenv('CI_CACHE_TIME') ? (int)getenv('CI_CACHE_TIME') : 600; // Cache time in seconds (10 minutes)
    }

    public function partnerHome()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $model = new TransactionModel();
        $data['transactions'] = $model->findAll();

        $model = new MarketModel();
        $data['market_previews'] = $model->getMarketPreview();
        
        return $this->renderView('partner_home_view', 'partner/partner_home',  $data);
    }

    public function p2p()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('p2p_view', 'partner/market/p2p');
    }

    public function Transaction()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('transaction_view', 'partner/reports/transaction');
    }

    public function Reports()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('transaction_view', 'partner/reports/reports');
    }

    public function Banking()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('banking_view', 'partner/reports/banking');
    }

    public function productDetails()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return $this->renderView('product_details_view', 'partner/dashboard/product_details',$data);
    }
    public function Market()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $model = new MarketModel();
        $data['market_previews'] = $model->getMarketPreview();
        return $this->renderView('market_view', 'partner/dashboard/market',$data);
    }
    public function Portfolio()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $userProfile = $this->partnerModel->getUserById($userId);

        // Pass the data to the view
        $data = [
            'userProfile' => $userProfile
        ];

        return $this->renderView('portfolio_view', 'partner/dashboard/portfolio',$data);
    }

    public function partnerProfile()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $userProfile = $this->partnerModel->getUserById($userId);

        // Pass the data to the view
        $data = [
            'userProfile' => $userProfile
        ];
        return $this->renderView('partner_profile_view', 'partner/apps/partner_profile',$data);
    }

    public function editProfile()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $userProfile = $this->partnerModel->getUserById($userId);

        // Pass the data to the view
        $data = [
            'userProfile' => $userProfile
        ];
        return $this->renderView('market_view', 'partner/apps/partner_edit_profile', $data );
    }

    public function updateProfile()
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');
        
        // Handle profile photo upload
        $profilePhoto = $this->request->getFile('profile_photo');
        $profilePhotoName = null;
        if ($profilePhoto->isValid() && !$profilePhoto->hasMoved()) {
            $newName = $profilePhoto->getRandomName();
            $profilePhoto->move(ROOTPATH . 'public/uploads/profiles', $newName);
            $profilePhotoName = $newName;
        }

        $data = [
            'user_name' => $this->request->getPost('user_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'company_name' => $this->request->getPost('company_name'),
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'designation' => $this->request->getPost('designation'),
            'skills' => $this->request->getPost('skills'),
            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),
            'country' => $this->request->getPost('country'),
            'city' => $this->request->getPost('city'),
            'about_me' => $this->request->getPost('about_me'),
            'profile_photo' => $profilePhotoName, // Save the new file name
            'language' => $this->request->getPost('language'),
            'age' => $this->request->getPost('age'),
            'experience' => $this->request->getPost('experience'),
            'location' => $this->request->getPost('location')
        ];

        $this->partnerModel->updateUser($userId, $data);

        return redirect()->to('/edit_profile')->with('success', 'Profile updated successfully');
    }


    /**
     * Renders content from cache if available, otherwise generates and caches it.
     *
     * @param string $cacheKey The cache key to use.
     * @param callable $contentGenerator A callable that generates the content if cache is missed.
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

    private function renderView(string $cacheKey, string $viewName, array $data = []): string
    {
        return $this->renderCache($cacheKey, function() use ($viewName, $data) {
            // Always get user data for every view
            $userData = session()->get('user_data') ?? [];
            $userData = is_array($userData) && !empty($userData);
            
            // Merge $userData with additional data passed to the method
            $viewData = array_merge(['userData' => $userData], $data);

            return view('partner/partner_header', $viewData)
                . view('partner/partner_sidebar', $viewData)
                . view($viewName, $viewData);
        });
    }

    /**
     * Checks if the user session is active.
     *
     * @return bool True if the session is active, false otherwise.
     */
    private function checkSession(): bool
    {
        return session()->has('user_data');
    }

}
