<?php

namespace App\Controllers;

use App\Models\{
    PartnerModel,
    TransactionModel,
    MarketModel,
    ProductModel,
    ProductHoldingsModel,
    BankAccountModel,
    InvestmentModel
};
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PartnerController extends BaseController
{
    protected PartnerModel $partnerModel;
    protected CacheInterface $cache;
    protected bool $useCache;
    protected int $cacheTime;
    protected ProductHoldingsModel $productHoldingsModel;
    protected InvestmentModel $investmentModel;

    public function __construct()
    {
        $this->partnerModel = new PartnerModel();
        $this->cache = \Config\Services::cache();
        $this->productHoldingsModel = new ProductHoldingsModel();
        $this->useCache = getenv('CI_ENVIRONMENT') === 'production';
        $this->cacheTime = (int)(getenv('CI_CACHE_TIME') ?: 600);
        $this->investmentModel = new InvestmentModel();
    }

    public function partnerHome(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }

        $data = [
            'transactions' => (new TransactionModel())->findAll(),
            'market_previews' => (new MarketModel())->getMarketPreview()
        ];

        return $this->renderView('partner_home_view', 'partner/partner_home', $data);
    }

    public function addFavorite(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return $this->response->setStatusCode(401)->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $product_id = $this->request->getPost('product_id');

        if (empty($product_id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid product ID']);
        }

        $result = $this->productHoldingsModel->updateFavorite($product_id);
        return $this->response->setJSON($result);
    }

    public function p2p(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('p2p_view', 'partner/market/p2p');
    }

    public function Transaction(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('transaction_view', 'partner/reports/transaction');
    }

    public function Reports(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('transaction_view', 'partner/reports/reports');
    }

    public function Banking(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        
        return $this->renderView('banking_view', 'partner/reports/banking');
    }

    public function ProductInvest(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $product_id = $this->request->getGet('product_id');
        $product = (new ProductModel())->find($product_id);

        return $this->renderView('banking_view', 'partner/product/product_invest',['product' => $product]);
    }

    public function ProductDetailsView(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }

        $product_id = $this->request->getGet('product_id');

        if ($product_id === null) {
            return redirect()->to('/products')->with('error', 'No product specified');
        }

        $product = (new ProductModel())->find($product_id);
        
        if ($product === null) {
            return redirect()->to('/products')->with('error', 'Product not found');
        }
        $productModel = new ProductModel();
        $similarProducts = $productModel->where('product_id !=', $product_id) // Exclude the current product
                                     ->findAll();

        //return $this->renderView('banking_view', 'partner/product/product_details_view', ['product' => $product],$data);
        return $this->renderView('banking_view', 'partner/product/product_details_view', [
            'product' => $product,
            'similarProducts' => $similarProducts,
        ]);
    }

    public function productDetails(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $data['product_data'] = (new ProductModel())->findAll();

        return $this->renderView('product_details_view', 'partner/product/product_details', $data);
    }

    public function Market(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $data['market_previews'] = (new MarketModel())->getMarketPreview();
        return $this->renderView('market_view', 'partner/dashboard/market', $data);
    }

    public function Portfolio(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $data = [
            'userProfile' => $this->partnerModel->getUserById($userId),
            'product_holdings' => $this->productHoldingsModel->getProductHoldingsWithIcons()
        ];

        return $this->renderView('portfolio_view', 'partner/dashboard/portfolio', $data);
    }

    public function partnerProfile(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $data = [
            'userProfile' => $this->partnerModel->getUserById($userId),
            'bankAccount' => (new BankAccountModel())->where('user_id', $userId)->first()
        ];

        return $this->renderView('partner_profile_view', 'partner/apps/partner_profile', $data);
    }

    public function editProfile(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');

        $data = [
            'userProfile' => $this->partnerModel->getUserById($userId)
        ];
        return $this->renderView('market_view', 'partner/apps/partner_edit_profile', $data);
    }

    public function updateProfile(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }
        $userId = session()->get('user_id');
        
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
            'profile_photo' => $profilePhotoName,
            'language' => $this->request->getPost('language'),
            'age' => $this->request->getPost('age'),
            'experience' => $this->request->getPost('experience'),
            'location' => $this->request->getPost('location')
        ];

        $this->partnerModel->updateUser($userId, $data);

        return redirect()->to('/edit_profile')->with('success', 'Profile updated successfully');
    }

    public function storeBankAccount(): ResponseInterface
    {
        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }

        $model = new BankAccountModel();
        $userId = session()->get('user_id');

        $data = [
            'user_id' => $userId,
            'account_number' => $this->request->getPost('account_number'),
            'ifsc' => $this->request->getPost('ifsc'),
            'name' => $this->request->getPost('name'),
            'branch' => $this->request->getPost('branch'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'zip' => $this->request->getPost('zip')
        ];

        foreach ($data as $key => $value) {
            if (empty($value)) {
                return redirect()->back()->withInput()->with('error', "The $key field is required.");
            }
        }

        $existing = $model->where('user_id', $userId)->first();
        if ($existing) {
            $model->update($existing['account_id'], $data);
        } else {
            $model->insert($data);
        }

        return redirect()->to('/partner_profile')->with('success', 'Bank account details saved successfully');
    }

    private function renderCache(string $cacheKey, callable $contentGenerator): string
    {
        if (!$this->useCache) {
            return $contentGenerator();
        }

        $cachedContent = $this->cache->get($cacheKey);

        if ($cachedContent === null) {
            $cachedContent = $contentGenerator();
            $this->cache->save($cacheKey, $cachedContent, $this->cacheTime);
        }

        return $cachedContent;
    }

    private function renderView(string $cacheKey, string $viewName, array $data = []): ResponseInterface
    {
        $content = $this->renderCache($cacheKey, function() use ($viewName, $data) {
            $userData = session()->get('user_data') ?? [];
            $viewData = ['userData' => !empty($userData)] + $data;

            // log_message('error', 'userData: ' . print_r($userData, true));

            return view('partner/partner_header', $viewData) .
                view('partner/partner_sidebar', $viewData) .
                view($viewName, $viewData);
        });

        return $this->response->setBody($content);
    }


    private function checkSession(): bool
    {
        return session()->has('user_data');
    }

    public function select_plan()
    {

        if (!$this->checkSession()) {
            return redirect()->to('/customer_login');
        }

        // Get data from POST request
        $plan = $this->request->getPost('plan');
        $product_id = $this->request->getPost('product_id');
        $user_id = $this->request->getPost('user_id');

        // Prepare data for database insertion
        $data = [
            'plan' => $plan,
            'product_id' => $product_id,
            'user_id' => $user_id,
            'time_stamp' => date('Y-m-d H:i:s')
        ];

        if ($this->investmentModel->save($data)) {
            $response = [
                'status' => 'success',
                'message' => 'Subscription Request Has been Submitted, Our Team Will Get Back To You. Thank You!',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'There was a problem saving your plan. Please try again.',
            ];
        }

        return $this->response->setJSON($response);
    }
    
}