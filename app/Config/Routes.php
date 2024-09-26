<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PublicController::index');
$routes->get('create_account', 'PublicController::create_account');
$routes->get('user_types', 'PublicController::user_types');
$routes->get('customer_registration', 'PublicController::customer_registration');
$routes->get('brand_partner_registration', 'PublicController::brand_partner_registration');
$routes->post('register_customer', 'PublicController::register_customer');
$routes->post('register_brand_partner', 'PublicController::register_brand_partner');
$routes->get('coming_soon', 'PublicController::coming_soon');
$routes->get('customer_login', 'PublicController::customerLogin');
$routes->post('login_process', 'PublicController::loginProcess');
$routes->get('otp_verification', 'PublicController::OTPVerification');
$routes->post('otp_login_process', 'PublicController::otp_login_process');
$routes->get('brand_partner_details', 'PublicController::BrandPartnerDetails');
$routes->get('agent_details', 'PublicController::AgentDetails');
$routes->get('supplier_details', 'PublicController::SupplierDetails');
$routes->get('b2b_partner_details', 'PublicController::B2BPartnerDetails');
$routes->post('product_favorite', 'PartnerController::addFavorite');
$routes->post('support_request', 'PartnerController::submitSupportRequest');

$routes->get('business_home', 'BusinessController::BusinessHome');

$routes->get('/public_login', 'PublicController::publicLogin');
$routes->get('/public_register', 'PublicController::publicRegisteration');
$routes->get('/google_login', 'GoogleLoginController::login');
$routes->get('/google_callback', 'GoogleLoginController::callback');

$routes->get('login/facebook', 'FacebookLoginController::login');
$routes->get('login/facebook_callback', 'FacebookLoginController::callback');

$routes->post('login_user', 'AuthController::loginProcess');
$routes->post('verify_phone', 'AuthController::validateOtp');

$routes->get('/register', 'AuthController::register'); 
$routes->post('/register_user', 'AuthController::register');  // Handle form submission
//Google Login
$routes->post('/google_login_process', 'GoogleLogin::loginProcess');
$routes->get('/google_login', 'GoogleLogin::login');
$routes->get('/logout', 'GoogleLogin::logout');

$routes->post('update_user_type', 'BusinessController::updateUserType');
$routes->get('choose_user_type', 'BusinessController::chooseUserType');

//partner-routes
$routes->get('partner_home', 'PartnerController::partnerHome');
$routes->get('product_details', 'PartnerController::productDetails');
$routes->get('market', 'PartnerController::Market');
$routes->get('portfolio', 'PartnerController::Portfolio');
$routes->get('partner_profile', 'PartnerController::partnerProfile');
$routes->get('edit_profile', 'PartnerController::editProfile');
$routes->post('update_profile', 'PartnerController::updateProfile');
$routes->get('p2p', 'PartnerController::p2p');
$routes->get('transaction', 'PartnerController::Transaction');
$routes->get('reports', 'PartnerController::Reports');
$routes->get('banking', 'PartnerController::Banking');
$routes->get('product_details_view', 'PartnerController::ProductDetailsView');
$routes->get('product_invest', 'PartnerController::ProductInvest');
$routes->post('/store_bank_account', 'PartnerController::storeBankAccount');

$routes->post('select_plan', 'PartnerController::select_plan');



//auth
$routes->get('/logout', 'AuthController::logout');




