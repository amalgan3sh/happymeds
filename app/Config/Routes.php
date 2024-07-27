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



//auth
$routes->get('/logout', 'AuthController::logout');




